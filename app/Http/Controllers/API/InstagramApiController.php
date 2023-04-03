<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iposts;


class InstagramApiController extends Controller
{
    //
    public function instagram()
    {
        $products1 = Iposts::select()->orderBy('id','desc')->get();
        // $products2 = Facebook::select()->orderBy('id','desc')->get();


        print_r($products1);exit();

        return response()->json([
        "success" => true,
        "message" => "Instagram posts",
        "data" => $products1
        ]);
      

    }
}
