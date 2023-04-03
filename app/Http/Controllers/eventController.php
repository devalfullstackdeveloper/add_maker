<?php

namespace App\Http\Controllers;

use App\Models\upcomingevents;
use Illuminate\Http\Request;
use Validator;
 use File;
// use Illuminate\Support\Facades\Validator;


class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcomingevents = upcomingevents::latest()->paginate();
    
        
       return view('upcomingevents.index',compact('upcomingevents'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('upcomingevents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date'=> 'required',
            'status'=> 'required'

            ]);
             
            $path = public_path('event_image');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->icon->extension();  
             $request->icon->move(public_path('event_image'), $imageName);
             $imagewithfolder = $imageName;

            }else{
            $imageName = time().'.'.$request->icon->extension();
            $request->icon->move(public_path('event_image'), $imageName);
            $imagewithfolder = $imageName;
            }
            $data = upcomingevents::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $imagewithfolder,
            'date'=>  $request->date,
            'status'=> $request->status,

        ]);
            return redirect()->route('event.index')
          ->with('success','upcoming events has been created successfully.');
          
     }
        
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\upcomingevents  $upcomingevents
     * @return \Illuminate\Http\Response
     */
    public function show(upcomingevents $upcomingevents ,$id)
    {
        //
        $data= upcomingevents::find($id);
        return view('upcomingevents.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\upcomingevents  $upcomingevents
     * @return \Illuminate\Http\Response
     */

    public function edit(upcomingevents $upcomingevents,$id )
    {
    
    
        $data= upcomingevents::find($id);
        return view('upcomingevents.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\upcomingevents  $upcomingevents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {

           // print_r($request->all()); exit();

            $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date'=> 'required',
            'status'=> 'required'

            ]);

       if($_FILES['icon']['name'] != ''){
            //upload image
        $path = public_path('event_image');

        if(!File::isDirectory($path)){
          File::makeDirectory($path, 0777, true, true);
          $imageName = time().'.'.$request->icon->extension();  
          $request->icon->move(public_path('event_image'), $imageName);
          $imagewithfolder = $imageName;

        }else{
          $imageName = time().'.'.$request->icon->extension();
          $request->icon->move(public_path('event_image'), $imageName);
          $imagewithfolder = $imageName;
        }

        $UpdateDetails = upcomingevents::where('id', $request->id)->update(array(
       "title" => $request->title,
       "description" => $request->description,
       "icon" => $imagewithfolder,
       "date" => $request->date,
        "status" => $request->status,

     ));

      }else{
       $UpdateDetails = upcomingevents::where('id', $request->id)->update(array(
        "title" => $request->title,
        "description" => $request->description,
        "date" => $request->date,
        "status" => $request->status,

     ));

      }
      return redirect()->route('event.index')
          ->with('success','upcoming events has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\upcomingevents  $upcomingevents
     * @return \Illuminate\Http\Response
     */
    public function destroy(upcomingevents $upcomingevents ,$id)
    {
        //
        //
        $idd = upcomingevents::findOrFail($id);
        $idd->delete();
        return redirect('/event')->with('completed', 'event has been deleted');
    
    }
    
}


