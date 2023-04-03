<?php

namespace App\Http\Controllers;

use App\Models\twitter;
use Illuminate\Http\Request;
 use File;
use Validator;

class twitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twitter = twitter::latest()->paginate();
       return view('twitter.index',compact('twitter'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('twitter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           $validation = Validator::make($request->all(),[ 
            'title' => 'required',
            'description'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date'=> 'required',
            'status'=> 'required'
            ]);
        
           $path = public_path('twitter_image');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->image->extension();  
             $request->image->move(public_path('twitter_image'), $imageName);
             $imagewithfolder = $imageName;

            }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('twitter_image'), $imageName);
            $imagewithfolder = $imageName;
            }
            $data = twitter::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagewithfolder,
            'date'=>  $request->date,
            'status'=> $request->status,
              ]);
            return redirect()->route('twitter.index')
          ->with('success','upcoming events has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\twitter  $twitter
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        //
         $data= twitter::find($id);
        return view('twitter.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\twitter  $twitter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $data= twitter::find($id);
        return view('twitter.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\twitter  $twitter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date'=> 'required',
            'status'=> 'required'

            ]);

       if($_FILES['image']['name'] != ''){
            //upload image
        $path = public_path('twitter_image');

        if(!File::isDirectory($path)){
          File::makeDirectory($path, 0777, true, true);
          $imageName = time().'.'.$request->image->extension();  
          $request->imageimage->move(public_path('twitter_image'), $imageName);
          $imagewithfolder = $imageName;

        }else{
          $imageName = time().'.'.$request->image->extension();
          $request->image->move(public_path('twitter_image'), $imageName);
          $imagewithfolder = $imageName;
        }

        $UpdateDetails = twitter::where('id', $request->id)->update(array(
       "title" => $request->title,
       "description" => $request->description,
       "image" => $imagewithfolder,
       "date" => $request->date,
        "status" => $request->status,

     ));

      }else{
       $UpdateDetails = twitter::where('id', $request->id)->update(array(
        "title" => $request->title,
        "description" => $request->description,
        "date" => $request->date,
        "status" => $request->status,

     ));

      }
      return redirect()->route('twitter.index')
          ->with('success','upcoming events has been created successfully.');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\twitter  $twitter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $idd = twitter::findOrFail($id);
        $idd->delete();
        return redirect('/twitter')->with('completed', 'event has been deleted');
     }
}
