<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Validator;

class ContactController extends BaseController
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
        $contactus = ContactUs::create($input);
   
        return $this->sendResponse($contactus, 'User register successfully.');
    } 
} 