<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;
use File;
use Validator;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poster = Poster::latest()->paginate();
       return view('poster.index',compact('poster'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poster.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'poster_name' => 'required',
            'description'=> 'required',
            'poster_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'poster_date'=> 'required',
            'status'=>      'required'
        ]);
        $file = $request->file('poster_img');
        $fileName = $request->file('poster_img')->getClientOriginalName();             
        $path = $request->file('poster_img')->storeAs('poster_img', $fileName);
        $data = Poster::create([
         'poster_name' => $request->poster_name,
         'description' => $request->description,
         'poster_img' => $path,
         'poster_date'=>  $request->poster_date,
         'status'=> $request->status,

     ]);
        return redirect()->route('poster.index')
        ->with('success','upcoming events has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Poster::find($id);
        return view('poster.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data= Poster::find($id);
        return view('poster.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  
        // print_r("hgkjh"); exit;
        $request->validate([
            'poster_name' => 'required',
            'description'=> 'required',
            'poster_date'=> 'required',
            'status'=> 'required'

            ]);

            if($_FILES['poster_img']['name'] != ''){
            $file = $request->file('poster_img');
            $fileName = $request->file('poster_img')->getClientOriginalName(); 
            if($fileName != ''){
                $path = $request->file('poster_img')->storeAs('poster_img', $fileName);
            }else{
                $path = $request['hidden_poster_img'];
            }          

            $UpdateDetails = Poster::where('id', $request->id)->update(array(
             "poster_name" => $request->poster_name,
             "description" => $request->description,
             "poster_img" => $path,
             "poster_date" => $request->poster_date,
             "status" => $request->status,
         ));

      }else{
       $UpdateDetails = Poster::where('id', $request->id)->update(array(
        "poster_name" => $request->poster_name,
        "description" => $request->description,
        "poster_date" => $request->poster_date,
        "status" => $request->status,

        ));

      }
      // print_r("hgkjh"); exit;
      return redirect()->route('poster.index')
          ->with('success','poster has been updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $idd = Poster::findOrFail($id);
        $idd->delete();
        return redirect('/poster')->with('completed', 'event has been deleted');
    }

    public function changeStatusPoster(Request $request)
    {  
   
        $user = Poster::find($request['id']);
        $user->status = $request['status'];
        $user->save();
  
    }
}
