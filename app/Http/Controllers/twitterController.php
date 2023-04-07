<?php

namespace App\Http\Controllers;

use App\Models\Twitter;
use Illuminate\Http\Request;
 use File;
use Validator;

class TwitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twitter = Twitter::latest()->paginate();
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
            $file = $request->file('image');
        $fileName = $request->file('image')->getClientOriginalName();             
        $path = $request->file('image')->storeAs('twitter_image', $fileName);
        $data = Twitter::create([
           'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
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
         $data= Twitter::find($id);
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
    
        $data= Twitter::find($id);
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
        $file = $request->file('image');
            $fileName = $request->file('image')->getClientOriginalName(); 
            if($fileName != ''){
                $path = $request->file('image')->storeAs('twitter_image', $fileName);
            }else{
                $path = $request['hidden_image'];
            }           

        $UpdateDetails = Twitter::where('id', $request->id)->update(array(
       "title" => $request->title,
       "description" => $request->description,
       "image" => $path,
       "date" => $request->date,
        "status" => $request->status,
     ));
        
      }else{
       $UpdateDetails = Twitter::where('id', $request->id)->update(array(
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
        $idd = Twitter::findOrFail($id);
        $idd->delete();
        return redirect('/twitter')->with('completed', 'event has been deleted');
     }
}
