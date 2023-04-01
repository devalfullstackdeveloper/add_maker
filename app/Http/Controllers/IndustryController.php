<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use DataTables;
use File;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  print_r("hre");exit();
       $industry = Industry::latest()->paginate();
        
       return view('industry.index',compact('industry'))
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
         return view('industry.create');
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
            'industry_type' => 'required',
            'description' => 'required',
            'industry_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             
            $path = public_path('industry_image');

            if(!File::isDirectory($path)){

               
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->industry_image->extension();  
             $request->industry_image->move(public_path('industry_image'), $imageName);
             $imagewithfolder = $imageName;


            }else{
            $imageName = time().'.'.$request->industry_image->extension();
            $request->industry_image->move(public_path('industry_image'), $imageName);
            $imagewithfolder = $imageName;
            }
            $data = Industry::create([
            'industry_type' => $request->industry_type,
            'description' => $request->description,
            'industry_image' => $imagewithfolder,

        ]);
            //  print_r($imagewithfolder);exit();
            return redirect()->route('industry.index')
          ->with('success','Industry has been created successfully.');
          

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
        // print_r("hrer..")
        $data= Industry::find($id);
        return view('industry.show',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // return view('industry.edit',compact('industry'));
        $data= Industry::find($id);
        return view('industry.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $request->validate([
            'industry_type' => 'required',    
            'description' => 'required', 
          ]);
    
        //  print_r($request->all());exit();
    
          if($_FILES['industry_image']['name'] != ''){
                //upload image
            $path = public_path('industry_image');
    
            if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
              $imageName = time().'.'.$request->industry_image->extension();  
              $request->industry_image->move(public_path('industry_image'), $imageName);
              $imagewithfolder = $imageName;
    
            }else{
              $imageName = time().'.'.$request->industry_image->extension();
              $request->industry_image->move(public_path('industry_image'), $imageName);
              $imagewithfolder = $imageName;
            }
    
            $UpdateDetails = Industry::where('id', $request->id)->update(array(
           "industry_type" => $request->industry_type,
           "description" => $request->description,
           "industry_image" => $imagewithfolder,
           
         ));
    
          }else{
           $UpdateDetails = Industry::where('id', $request->id)->update(array(
            "industry_type" => $request->industry_type,
            "description" => $request->description,
         ));
    
          }
            // print_r($request->all());exit();
          return redirect()->route('industry.index')
                       ->with('success','Industry updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $idd = Industry::findOrFail($id);
        $idd->delete();
        return redirect('/industry')->with('completed', 'Industry has been deleted');
    }
}

    

