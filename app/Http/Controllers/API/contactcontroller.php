<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\contactus;
use Illuminate\Http\Request;
use Validator;

class contactcontroller extends BaseController
{

    public function store(Request $request)
    {
       $input = $request->all();
     
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
         if($validator->fails())
        {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $contactus = contactus::create($input);
   
        return $this->sendResponse($contactus, 'User register successfully.');
    } 
} 
