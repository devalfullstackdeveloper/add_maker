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
        $file = $request->file('industry_image');
        $fileName = $request->file('industry_image')->getClientOriginalName();             
        $path = $request->file('industry_image')->storeAs('industry_image', $fileName);
        $data = Industry::create([
            'industry_type' => $request->industry_type,
            'description' => $request->description,
            'industry_image' => $path,

        ]);

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
            // 'industry_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if($_FILES['industry_image']['name'] != ''){
            $file = $request->file('industry_image');
            $fileName = $request->file('industry_image')->getClientOriginalName(); 
            if($fileName != ''){
                $path = $request->file('industry_image')->storeAs('industry_image', $fileName);
            }else{
                $path = $request['hidden_industry_image'];
            }           
            
            $UpdateDetails = Industry::where('id', $request->id)->update(array(
             "industry_type" => $request->industry_type,
             "description" => $request->description,
             "industry_image" => $path,

         ));

        }else{
         $UpdateDetails = Industry::where('id', $request->id)->update(array(
            "industry_type" => $request->industry_type,
            "description" => $request->description,
        ));

     }
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



