<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class AdminApiController extends Controller
{

    public function edit(Request $request, $id){
        $input = $request->all();
        $user = User::find($id);
        // print_r($input);exit();
        $validator = Validator::make($input, [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                    'c_password' => 'required|same:password',
        
                ]);
                if($validator->fails()){
                    return $this->sendError($validator->errors());       
                }
                $user->name = $input['name'];
                $user->email = $input['email'];
                $user->password = bcrypt($input['password']);
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['name'] =  $user->name;
                $user->save();
                
                // return $this->sendResponse($success, 'Post updated.');
                return response()->json([
                    "success" => true,
                    "message" => "Admin edit successfully",
                    ]);
          
      }

        public function delete(User $user,$id)
        {
          $user = User::find($id);
          $user->delete();
          return response()->json([
          "success" => true,
          "message" => "Admin deleted successfully.",
          ]);
        }


}
