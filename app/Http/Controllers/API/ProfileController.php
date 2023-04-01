<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\profile;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = profile::all();
        return $this->sendResponse($profile, 'profile retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'mobile_no' => 'required',
            
        ]);
         if($validator->fails())
        {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $profile = profile::create($input);
   
        return $this->sendResponse($profile, 'User register successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $profile = profile::find($id);
        if (is_null($profile)) {
            return $this->sendError(' profile not found.');
        }
        return $this->sendResponse($profile, 'profile retrieved successfully.'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile)
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'mobile_no' => 'required'
        ]);
     
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
     
        $profile->name = $input['name'];
        $profile->mobile_no = $input['mobile_no'];
        $profile->save();
     
        return $this->sendResponse($profile, 'profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $profile = profile::find($id);
          $profile->delete();
          return response()->json([
          "success" => true,
          "message" => "Profile deleted successfully.",
          ]);
    }
}
