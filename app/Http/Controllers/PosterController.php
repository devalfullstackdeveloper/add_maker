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
        $poster = poster::latest()->paginate();
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
        
          $path = public_path('poster_image');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->poster_img->extension();  
             $request->poster_img->move(public_path('poster_image'), $imageName);
             $imagewithfolder = $imageName;

            }else{
            $imageName = time().'.'.$request->poster_img->extension();
            $request->poster_img->move(public_path('poster_image'), $imageName);
            $imagewithfolder = $imageName;
            }
            $data = poster::create([
            'poster_name' => $request->poster_name,
            'description' => $request->description,
            'poster_img' => $imagewithfolder,
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
        $data= poster::find($id);
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
         $data= poster::find($id);
        return view('poster.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'poster_name' => 'required',
            'description'=> 'required',
            'poster_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'poster_date'=> 'required',
            'status'=> 'required'

            ]);

       if($_FILES['poster_img']['name'] != ''){
            //upload image
        $path = public_path('poster_image');

        if(!File::isDirectory($path)){
          File::makeDirectory($path, 0777, true, true);
          $imageName = time().'.'.$request->poster_img->extension();  
          $request->poster_img->move(public_path('poster_image'), $imageName);
          $imagewithfolder = $imageName;

        }else{
          $imageName = time().'.'.$request->poster_img->extension();
          $request->poster_img->move(public_path('poster_image'), $imageName);
          $imagewithfolder = $imageName;
        }

        $UpdateDetails = poster::where('id', $request->id)->update(array(
       "poster_name" => $request->poster_name,
       "description" => $request->description,
       "poster_img" => $imagewithfolder,
       "poster_date" => $request->poster_date,
        "status" => $request->status,

     ));

      }else{
       $UpdateDetails = poster::where('id', $request->id)->update(array(
        "poster_name" => $request->poster_name,
        "description" => $request->description,
        "poster_date" => $request->poster_date,
        "status" => $request->status,

     ));

      }
      return redirect()->route('poster.index')
          ->with('success','upcoming events has been created successfully.'); 
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
        $idd = poster::findOrFail($id);
        $idd->delete();
        return redirect('/poster')->with('completed', 'event has been deleted');
    }
}
