<?php

namespace App\Http\Controllers;

use App\Models\business_card;
use Illuminate\Http\Request;
use File;

class BussinessCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $business_card= business_card::latest()->paginate(5);
      
        return view('business_card.index',compact('business_card'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('business_card.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestbusiness_card
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'description' => 'required',
            'image' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
        $path = public_path('image');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->image->extension();  
             $request->image->move(public_path('image'), $imageName);
             $imagewithfolder = $imageName;

            }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $imagewithfolder = $imageName;
            }
            $data = business_card::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagewithfolder,
            'date'=>  $request->date,
            'status'=> $request->status,
              ]);
      
        // business_card::create($request->all());
       
        return redirect()->route('bcard.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bussiness_card  $bussiness_card
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
          $data= business_card::find($id);
        return view('business_card.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bussiness_card  $bussiness_card
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data= business_card::find($id);
        return view('business_card.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\business_card  $business_card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, business_card $business_card)
    {
        
        $request->validate([
            'description' => 'required',  
            'image' => 'required',
            'date' => 'required',
            'status' => 'required',        
        ]);
         if($_FILES['image']['name'] != ''){
            //upload image
        $path = public_path('image');

        if(!File::isDirectory($path)){
          File::makeDirectory($path, 0777, true, true);
          $imageName = time().'.'.$request->image->extension();  
          $request->imageimage->move(public_path('image'), $imageName);
          $imagewithfolder = $imageName;

        }else{
          $imageName = time().'.'.$request->image->extension();
          $request->image->move(public_path('image'), $imageName);
          $imagewithfolder = $imageName;
        }

        $UpdateDetails = business_card::where('id', $request->id)->update(array(
       "description" => $request->description,
       "image" => $imagewithfolder,
       "date" => $request->date,
        "status" => $request->status,

     ));

      }else{
       $UpdateDetails = business_card::where('id', $request->id)->update(array(
        "description" => $request->description,
        "date" => $request->date,
        "status" => $request->status,

     ));

      }

        // $business_card->update($request->all());

        return redirect()->route('bcard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bussiness_card  $bussiness_card
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business_card = business_card::findOrFail($id);
        $business_card->delete();
        return redirect()->route('bcard.index');
    }
}
