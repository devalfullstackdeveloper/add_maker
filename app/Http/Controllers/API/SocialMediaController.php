<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Validator;

class SocialMediaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $media = SocialMedia::all();
      
        return $this->sendResponse($media, 'Products retrieved successfully.');

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
        // print_r($request->all());exit();
          $input = $request->all();
     
        $validator = Validator::make($input, [
            'media_title' => 'required',
            'media_description' => 'required',
            'media_link' => 'required',
            'media_thumbnail' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if ($request->hasFile('media_thumbnail')) {
        $image_path = $request->file('media_thumbnail')->store('media', 'public');
        $input['media_thumbnail']=$image_path;
        $media = SocialMedia::create($input);
        return $this->sendResponse($media, 'Social Media created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $media = SocialMedia::find($id);
    
        if (is_null($media)) {
            return $this->sendError('Social Media not found.');
        }
     
        return $this->sendResponse($media, 'Social Media retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $socialMedia = SocialMedia::find($id);
     
        $validator = Validator::make($input, [
            'media_title' => 'required',
            'media_description' => 'required',
            'media_link' => 'required',
            'media_thumbnail' => 'required|image:jpeg,png,jpg,gif,svg|max:2048' 
        ]);
     
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        if ($request->hasFile('media_thumbnail')) {
            $image_path = $request->file('media_thumbnail')->store('media', 'public');

            $socialMedia->media_title = $input['media_title'];
            $socialMedia->media_description = $input['media_description'];
            $socialMedia->media_link = $input['media_link'];
            $socialMedia->media_thumbnail = $image_path ;
            $socialMedia->save();
    
        return $this->sendResponse($socialMedia, 'Social Media updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $socialMedia = SocialMedia::find($id);
        $socialMedia->delete();
        return $this->sendResponse($socialMedia, 'Social Media deleted successfully.'); 
    }
}
