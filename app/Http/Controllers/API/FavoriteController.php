<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Iposts;
use Validator;
use DB;

class FavoriteController extends Controller
{
    public function fav(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'post_id' => 'required',
            'story_type' => 'required',
            'status' => 'required'
        ]);
  
        $user = Favorite::select('user_id', 'post_id')->where('user_id', '=', $request->user_id)
            ->where('post_id', '=', $request->post_id)->get();

        if ($user->isEmpty()) {
            $Favorite = Favorite::create($input);
            return ($Favorite);
        } else {
            echo "This card is already in favorite list";
        }
    }
}
