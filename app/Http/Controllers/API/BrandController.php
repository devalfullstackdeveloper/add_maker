<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Brand;
use Illuminate\Http\Request;
use Validator;

class BrandController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // print_r("here");exit();

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'website' => 'required',
            'tagline' => 'required',
            'services' => 'required',
            'display_media' => 'required',
            'brand_icon' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        if ($request->hasFile('brand_icon')) {
            $image_path = $request->file('brand_icon')->store('brand', 'public');
            $input['brand_icon']=$image_path;
           
        $brand = Brand::create($input);
   
        return response()->json([
            "success" => true,
            "message" => "Brand info created successfully",
            "data" => $brand
            ]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $input = $request->all();
        $brand = Brand::find($id);
        // print_r($input);exit();
        $validator = Validator::make($input, [
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'website' => 'required',
            'tagline' => 'required',
            'services' => 'required',
            'display_media' => 'required',
            'brand_icon' => 'required',
        
            ]);
            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }
            $brand->name = $input['name'];
            $brand->contact = $input['contact'];
            $brand->address = $input['address'];
            $brand->website = $input['website'];
            $brand->tagline = $input['tagline'];
            $brand->services = $input['services']; 
            $brand->display_media = $input['display_media'];
            $brand->brand_icon = $input['brand_icon'];          
            $brand->save();
                           
            return response()->json([
                "success" => true,
                "message" => "Brand info edit successfully",
                ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
