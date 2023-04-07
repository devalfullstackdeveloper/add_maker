<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;
use File;
use Validator;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtube = Youtube::latest()->paginate();
       return view('youtube.index',compact('youtube'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        return view('youtube.create');   
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
            'title' => 'required',
            'description'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date'=> 'required',
            'status'=> 'required'
        ]);
        $file = $request->file('image');
        $fileName = $request->file('image')->getClientOriginalName();             
        $path = $request->file('image')->storeAs('yt_image', $fileName);
        $data = Youtube::create([
             'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'date'=>  $request->date,
            'status'=> $request->status,
              ]);
            return redirect()->route('youtube.index')
          ->with('success','thumbnail has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Youtube::find($id);
        return view('youtube.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data= Youtube::find($id);
        return view('youtube.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, youtube $youtube)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date'=> 'required',
            'status'=> 'required'
            ]);

       if($_FILES['image']['name'] != ''){
         $file = $request->file('image');
            $fileName = $request->file('image')->getClientOriginalName(); 
            if($fileName != ''){
                $path = $request->file('image')->storeAs('yt_image', $fileName);
            }else{
                $path = $request['hidden_image'];
            }           
            

        $UpdateDetails = Youtube::where('id', $request->id)->update(array(
       "title" => $request->title,
       "description" => $request->description,
       "image" => $path,
       "date" => $request->date,
        "status" => $request->status,

     ));

      }else{
       $UpdateDetails = Youtube::where('id', $request->id)->update(array(
        "title" => $request->title,
        "description" => $request->description,
        "date" => $request->date,
        "status" => $request->status,

     ));

      }
      return redirect()->route('youtube.index')
          ->with('success','upcoming events has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idd = Youtube::findOrFail($id);
        $idd->delete();
        return redirect('/youtube')->with('completed', 'event has been deleted');
    }
}
