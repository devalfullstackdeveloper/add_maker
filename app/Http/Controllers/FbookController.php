<?php

namespace App\Http\Controllers;
use File;
use App\Models\Facebook;
use Illuminate\Http\Request;

class FbookController extends Controller
{
   
     /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facebook = Facebook::latest()->paginate();
      
        return view('facebook.index',compact('facebook'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('facebook.create');

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
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required'
            ]);
           

            $path = public_path('facebook_image');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->image->extension();  

             $request->image->move(public_path('facebook_image'), $imageName);

             $request->image->move(public_path('image'), $imageName);

             $imagewithfolder = $imageName;

            }else{
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('facebook_image'), $imageName);

            $request->image->move(public_path('image'), $imageName);

            $imagewithfolder = $imageName;
            }
            $data = Facebook::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagewithfolder,
            'status' => $request->status,
            ]);
           
           return redirect()->route('fbook.index')
            ->with('success','Facebook has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data= Facebook::find($id);
        return view('facebook.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data= Facebook::find($id);
        return view('facebook.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    { 

      $request->validate([
        'title' => 'required',    
        'description' => 'required', 
        'status' => 'required'
      ]);

    //  print_r($request->all());exit();

      if($_FILES['image']['name'] != ''){
            //upload image
        $path = public_path('facebook_image');

        if(!File::isDirectory($path)){
          File::makeDirectory($path, 0777, true, true);
          $imageName = time().'.'.$request->image->extension();  

          $request->image->move(public_path('facebook_image'), $imageName);

          $request->image->move(public_path('image'), $imageName);

          $imagewithfolder = $imageName;

        }else{
          $imageName = time().'.'.$request->image->extension();

          $request->image->move(public_path('facebook_image'), $imageName);

          $request->image->move(public_path('image'), $imageName);

          $imagewithfolder = $imageName;
        }

        $UpdateDetails = Facebook::where('id', $request->id)->update(array(
       "title" => $request->title,
       "description" => $request->description,
       "image" => $imagewithfolder,
       "status" => $request->status,
     ));

      }else{
       $UpdateDetails = Facebook::where('id', $request->id)->update(array(
        "title" => $request->title,
        "description" => $request->description,
        "status" => $request->status,
     ));

      }
      return redirect()->route('fbook.index')
                   ->with('success','Facebook updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $idd = Facebook::findOrFail($id);
        $idd->delete();
        return redirect('/fbook')->with('completed', 'Facebook has been deleted');
    }
}
