<?php

namespace App\Http\Controllers\API;

use App\Models\userlogin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;

class AuthOtpController extends Controller
{
    public function login(Request $request)

    {
        if (isset($request->otp)) {
            //validation in register API
            $validation = Validator::make($request->all(), [
                'mobile_no' => 'required',
                'otp' => 'required|min:4|max:4'
            ]);
            if ($validation->fails()) {
                //Return the validation error
                $Error = $validation->messages();
                return $Error;
            } else {
                $user = userlogin::select()
                    ->where('mobile_no', $request->mobile_no)
                    ->where('otp', $request->otp)
                    ->first();
                if (isset($user)) {
                    $token = $user->createToken('API Token')->accessToken;
                    return response()->json([
                        'success' => true,
                        // 'userlogin' => $user,
                        'message' => "login successfully",
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => " OTP is in-correct",
                    ]);
                }
            }
        } else {
            $validation = Validator::make($request->all(), [
                'mobile_no' => 'required|unique:userlogin',
            ]);
            if ($validation->fails()) {
                //Return the validation error
                $WithError = $validation->messages();
                return $WithError;
            } else {
                // Generate OTP //
                $otp = $this->generateOtp();

                //create the user after validate
                $user = userlogin::create([
                    'mobile_no' => $request['mobile_no'],
                    'otp' => $otp
                ]);


                return response(
                    [
                        'success' => true,
                        'otp' => $otp,
                        'message' => 'OTP for registration sent successfully.'
                    ],
                    200
                );
            }
        }
    }

    //generate otp// 
    public function generateOtp()
    {
        $otp = mt_rand(1000, 9999);
        $str = str_shuffle($otp);
        return $str;
    }
}
