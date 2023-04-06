<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AdminApiController extends BaseController
{
  public function register(Request $request)
    {
        if(isset($request->otp))
        {
            //validation in register API
            $validation = Validator::make($request->all(),[ 
                'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'email' => 'email|max:255',
                'mobileno' => 'max:15',
                'otp' => 'min:6|max:6',

            ]);
    
        if($validation->fails()){

                //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;

            } else{
                $get_user = User::select()
                ->where('mobileno',$request->mobileno)
                ->where('otp',$request->otp)
                ->first();

                if(isset($get_user))
                {
                $token = $get_user->createToken('API Token')->accessToken;
                    
                    return response()->json([
                        'success' => true,
                         "code" => 1,
                         'token' => $token,
                         'user' => $get_user,
                        'message' => "Registration is successfully done",
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "No data found please re-registered or OTP is in-correct",
                    ], 200);
                  }
                }
                } else {
            $validation = Validator::make($request->all(), [
              'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'email' => 'max:255',
                'mobileno' => 'max:15',
                'otp' => 'min:6|max:6',
            ]);
         if($validation->fails()){

            //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;

            } else{

                // / Generate OTP /
                $otp = $this->generateOtp();

                //create the users after validate
                $user = User::create([
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'middlename' => $request['middlename'],
                    'email' => $request['email'],
                    'password' => bcrypt($otp),
                    'mobileno' => $request['mobileno'],
                    'is_admin' => $request['is_admin'],
                    'google_id' => isset($request->google_id) ? $request->google_id : null,
                    'instagram_id' => isset($request->instagram_id) ? $request->instagram_id : null,
                    'facebook_id' => isset($request->facebook_id) ? $request->facebook_id : null,
                    'apple_id' => isset($request->apple_id) ? $request->apple_id : null,
                    'otp' => $otp,
                ]);
          return response([
                    'success' => true,
                    'otp' => $otp,
                    //'token' => $token,
                    'message'=> 'OTP for registration sent successfully.']
                    ,200);

            }
        }
    }   
 public function login(Request $request)
    {
      
  
       if(isset($request->otp))
       {
        $validation = Validator::make($request->all(),[ 
            'mobileno' => 'required',
             'otp' => 'required',
        ]);

        if($validation->fails()){

                    //Return the validation error
            $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
            return $fieldsWithErrorMessagesArray;
        }
        else
        {
            $user = User::where('mobileno', $request->mobileno)->first();

            if(isset($user->otp)){
                if($user->otp == $request->otp)
                {
                    //User authenticated
                    Auth::login($user); 

                $token = Auth()->user()->createToken('API Token')->accessToken;

                return response([
                   'success' => true,
                   "code" => 1,
                   'message' => "Login successfully",
                   'user' => $user,
                   'token' => $token]);
                //return response(['user' => Auth()->user(), 'token' => $token]);

            }
            else
            {
                //User not authenticated otp wrong
                return response(['message' => "No data found or OTP is in-correct"]);

                }
            }else{
                //User not authenticated Mobile No wrong
             return response(['message' => "No data found or Mobile No is in-correct"]);
            }

        }
        }else{
            $validation = Validator::make($request->all(),[ 
                'mobileno' => 'required',
            ]);

            if($validation->fails()){
                    //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;
            }else{
                    $user = User::where('mobileno', $request->mobileno)->first();
                    if ($user) { 
                       $get_user_OTP = User::select('otp')->where('mobileno',$request->mobileno)->first();
                       if($get_user_OTP)
                       {

                        return response()->json([
                            'success' => true,
                            'message' => "OTP sent successfully",
                            'otp' => $get_user_OTP->otp
                        ], 200);
                    }
                    else
                    {
                        return response()->json([
                            'success' => false,
                            'message' => "Error for sending OTP",
                        ], 200);
                    }
                }else{
                    return response(['success' => false,
                        'message' => "No data was found on this mobile number please Sign-up first"]);

                }
            }

        }
    }
    
    public function generateOtp(){
        $pin = mt_rand(100000,999999);
            // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }

}
