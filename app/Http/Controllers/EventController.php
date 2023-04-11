<?php

namespace App\Http\Controllers;

use App\Models\UpcomingEvents;
use Illuminate\Http\Request;
use Validator;
 use File;
// use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcomingevents = UpcomingEvents::latest()->paginate();
    
        
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
         $file = $request->file('icon');
        $fileName = $request->file('icon')->getClientOriginalName();             
        $path = $request->file('icon')->storeAs('event_image', $fileName);

            $data = UpcomingEvents::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $path,
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
    public function show(UpcomingEvents $upcomingevents ,$id)
    {
        //
        $data= UpcomingEvents::find($id);
        return view('upcomingevents.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\upcomingevents  $upcomingevents
     * @return \Illuminate\Http\Response
     */

    public function edit($id )
    {
    
    
        $data= UpcomingEvents::find($id);
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
            $file = $request->file('icon');
            $fileName = $request->file('icon')->getClientOriginalName(); 
            if($fileName != ''){
                $path = $request->file('icon')->storeAs('event_image', $fileName);
            }else{
                $path = $request['hidden_icon'];
            }           
            
            $UpdateDetails = UpcomingEvents::where('id', $request->id)->update(array(
             "title" => $request->title,
            "description" => $request->description,
            "icon" => $path,
            "date" => $request->date,
           "status" => $request->status,

         ));
        }else{
         $UpdateDetails = UpcomingEvents::where('id', $request->id)->update(array(
            "title" => $request->title,
             "description" => $request->description,
            "date" => $request->date,
           "status" => $request->status,
     ));
      return redirect()->route('event.index')
          ->with('success','upcoming events has been updated successfully.');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\upcomingevents  $upcomingevents
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    { 

        $idd = UpcomingEvents::findOrFail($id);
        $idd->delete();
        return redirect('/event')->with('completed', 'event has been deleted');
    
    }
    
}