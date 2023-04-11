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

      $input=$request->login_id;
//otp and mobile number login
if($input == '1'){
        if(isset($request->otp))
        {
            //validation in register API
            $validation = Validator::make($request->all(),[ 
                'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'email' => 'email|max:255',
                'mobileno' => 'required|max:15',
                'otp' => 'min:6|max:6',
                'login_id' => 'required',
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
                }
                } else {
            $validation = Validator::make($request->all(), [
              'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'email' => 'max:255',
                'mobileno' => 'required|max:15',
                'otp' => 'min:6|max:6',
                'login_id' => 'required',
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
                    'password' => bcrypt($request['password']),
                    'mobileno' => $request['mobileno'],
                    'login_id' =>  $request['login_id'],
                    'otp' => $otp,
                ]);

          return response([
                    'success' => true,
                    'otp' => $otp,
                    // 'token' => $token,
                    'message'=> 'OTP for registration sent successfully.']
                    ,200);

            }
        }
}
//facebook_id login
else if($input == 2){
     $validation = Validator::make($request->all(), [
              'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'facebook_id' => 'required',
                'login_id' => 'required',
            ]);
         if($validation->fails()){

            //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;

            } else{

                 $get_user = User::select()
                ->where('facebook_id',$request->facebook_id)
                ->first();
                
               
                //create the users after validate
                $user = User::create([
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'middlename' => $request['middlename'],
                    'login_id' =>  $request['login_id'],
                    'facebook_id' =>  $request['facebook_id'],
                ]);
                $success['token'] = $user->createToken('MyApp')->accessToken;
                 if(isset($user)){
                    return response([
                    'success' => true,
                    'token' => $success,
                    'message'=> 'registration successfully done.']
                    ,200);
            }
            else {
                return response()->json([
                    'success' => false,
                    'message' => "in-correct",
                ]);
            }
            }
        }
//instagram_id login
else if($input == 3){
   $validation = Validator::make($request->all(), [
              'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'instagram_id' => 'required',
                'login_id' => 'required',
            ]);
         if($validation->fails()){

            //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;

            } else{

                 $get_user = User::select()
                ->where('instagram_id',$request->instagram_id)
                ->first();
                


                //create the users after validate
                $user = User::create([
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'middlename' => $request['middlename'],
                    'login_id' =>  $request['login_id'],
                    'instagram_id' =>  $request['instagram_id'],
                ]);
                $success['token'] = $user->createToken('MyApp')->accessToken;
                 if(isset($user)){
                    return response([
                    'success' => true,
                    'token' => $success,
                    'message'=> 'registration successfully done.']
                    ,200);
            }
            else {
                return response()->json([
                    'success' => false,
                    'message' => "in-correct",
                ]);
            }
            }
        }
//google_id Login
else if($input == 4){
      $validation = Validator::make($request->all(), [
              'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'google_id' => 'email|required',
                'login_id' => 'required',
            ]);
         if($validation->fails()){

            //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;

            } else{

                 $get_user = User::select()
                ->where('google_id',$request->google_id)
                ->first();
                
                //create the users after validate
                $user = User::create([
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'middlename' => $request['middlename'],
                    'login_id' =>  $request['login_id'],
                    'google_id' =>  $request['google_id'],
                ]);

                $success['token'] = $user->createToken('MyApp')->accessToken;
                 if(isset($user)){
                    return response([
                    'success' => true,
                    'token' => $success,
                    'message'=> 'registration successfully done.']
                    ,200);
            }
            else {
                return response()->json([
                    'success' => false,
                    'message' => " in-correct",
                ]);
            }
            }
        }
//apple_id login
else if($input == 5){
      $validation = Validator::make($request->all(), [
              'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'apple_id' => 'required',
                'login_id' => 'required',
            ]);
         if($validation->fails()){

            //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;

            } else{



                 $get_user = User::select()
                ->where('apple_id',$request->apple_id)
                ->first();
                


                //create the users after validate
                $user = User::create([
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'middlename' => $request['middlename'],
                    'login_id' =>  $request['login_id'],
                    'apple_id' =>  $request['apple_id'],
                ]);
                $success['token'] = $user->createToken('MyApp')->accessToken;
                 if(isset($user)){
                    return response([
                    'success' => true,
                    'token' => $success,
                    'message'=> 'registration successfully done.']
                    ,200);
            }
            else {
                return response()->json([
                    'success' => false,
                    'message' => "in-correct",
                ]);
            }
            }
        }
//admin side login
else if($input == 6){
      $validation = Validator::make($request->all(), [
              'firstname' => 'max:255',
                'lastname' => 'max:255',
                'middlename' => 'max:255',
                'email' => 'required',
                'password' => 'required',
            ]);
         if($validation->fails()){

            //Return the validation error
                $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
                return $fieldsWithErrorMessagesArray;

            } else{

                 $get_user = User::select()
                ->where('email',$request->email)
                ->where('password',$request->password)
                ->first();
                
                //$token = $get_user->createToken('API Token')->accessToken;
                //create the users after validate
                $user = User::create([
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'middlename' => $request['middlename'],
                    'is_admin' => $request['is_admin'],
                    'email' =>  $request['email'],
                    'password' => bcrypt($request['password']),
                ]);
                $success['token'] = $user->createToken('MyApp')->accessToken;
                 if(isset($user)){
                    return response([
                    'success' => true,
                    'token' => $success,
                    'message'=> 'registration successfully done.']
                    ,200);
            }
            else {
                return response()->json([
                    'success' => false,
                    'message' => "in-correct",
                ]);
            }
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
                   'token' => $token]);
              
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

if($request->login_id=='2'){

        $validation = Validator::make($request->all(),[ 
            'facebook_id' => 'required',
        ]);

        if($validation->fails()){

                    //Return the validation error
            $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
            return $fieldsWithErrorMessagesArray;
        }
        else
        {
            $user = User::where('facebook_id', $request->facebook_id)->first();

            if(isset($user->facebook_id)){
    
                    //User authenticated
                    Auth::login($user); 

                $token = Auth()->user()->createToken('API Token')->accessToken;

                return response([
                   'success' => true,
                   "code" => 1,
                   'message' => "Login successfully",
                   'token' => $token]);
                

            }else{
                //User not authenticated Mobile No wrong
             return response(['message' => "No data found"]);
            }

        }
    }
elseif($request->login_id=='3'){

        $validation = Validator::make($request->all(),[ 
            'instagram_id' => 'required',
        ]);

        if($validation->fails()){

                    //Return the validation error
            $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
            return $fieldsWithErrorMessagesArray;
        }
        else
        {
            $user = User::where('instagram_id', $request->instagram_id)->first();

            if(isset($user->instagram_id)){
    
                    //User authenticated
                    Auth::login($user); 

                $token = Auth()->user()->createToken('API Token')->accessToken;

                return response([
                   'success' => true,
                   "code" => 1,
                   'message' => "Login successfully",
                   'token' => $token]);

            }else{
                //User not authenticated Mobile No wrong
             return response(['message' => "No data found"]);
            }

        }
    }
elseif($request->login_id=='4'){

        $validation = Validator::make($request->all(),[ 
            'google_id' => 'required',
        ]);

        if($validation->fails()){

                    //Return the validation error
            $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
            return $fieldsWithErrorMessagesArray;
        }
        else
        {
            $user = User::where('google_id', $request->google_id)->first();

            if(isset($user->google_id)){
    
                    //User authenticated
                    Auth::login($user); 

                $token = Auth()->user()->createToken('API Token')->accessToken;

                return response([
                   'success' => true,
                   "code" => 1,
                   'message' => "Login successfully",
                   'token' => $token]);
               

            }else{
                //User not authenticated Mobile No wrong
             return response(['message' => "No data found"]);
            }

        }
    }
elseif($request->login_id=='5'){

        $validation = Validator::make($request->all(),[ 
            'apple_id' => 'required',
        ]);

        if($validation->fails()){

                    //Return the validation error
            $fieldsWithErrorMessagesArray = $validation->messages()->get('*');
            return $fieldsWithErrorMessagesArray;
        }
        else
        {
            $user = User::where('apple_id', $request->apple_id)->first();

            if(isset($user->apple_id)){
    
                    //User authenticated
                    Auth::login($user); 

                $token = Auth()->user()->createToken('API Token')->accessToken;

                return response([
                   'success' => true,
                   "code" => 1,
                   'message' => "Login successfully",
                   'token' => $token]);
               

            }else{
                //User not authenticated Mobile No wrong
             return response(['message' => "No data found"]);
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
