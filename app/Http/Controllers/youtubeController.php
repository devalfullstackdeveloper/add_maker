<?php

namespace App\Http\Controllers;

use App\Models\youtube;
use Illuminate\Http\Request;
use File;
use Validator;

class youtubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtube = youtube::latest()->paginate();
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
        
           $path = public_path('yt_image');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->image->extension();  
             $request->image->move(public_path('yt_image'), $imageName);
             $imagewithfolder =$imageName;

            }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('yt_image'), $imageName);
            $imagewithfolder = $imageName;
            }
            $data = youtube::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagewithfolder,
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
        $data= youtube::find($id);
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
          $data= youtube::find($id);
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
            //upload image
        $path = public_path('yt_image');

        if(!File::isDirectory($path)){
          File::makeDirectory($path, 0777, true, true);
          $imageName = time().'.'.$request->image->extension();  
          $request->imageimage->move(public_path('yt_image'), $imageName);
          $imagewithfolder = $imageName;

        }else{
          $imageName = time().'.'.$request->image->extension();
          $request->image->move(public_path('yt_image'), $imageName);
          $imagewithfolder = $imageName;
        }

        $UpdateDetails = youtube::where('id', $request->id)->update(array(
       "title" => $request->title,
       "description" => $request->description,
       "image" => $imagewithfolder,
       "date" => $request->date,
        "status" => $request->status,

     ));

      }else{
       $UpdateDetails = youtube::where('id', $request->id)->update(array(
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
        $idd = youtube::findOrFail($id);
        $idd->delete();
        return redirect('/youtube')->with('completed', 'event has been deleted');
    }
}
