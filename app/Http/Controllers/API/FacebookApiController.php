<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facebook;
use App\Models\Posts;

class FacebookApiController extends Controller
{
    //
    public function index()
    {
        $products = Facebook::all();
        return response()->json([
        "success" => true,
        "message" => "Facebook List",
        "data" => $products
        ]);
        
    }

    public function facebook()
    {
        // fetch data of facebook ads
        $Facebook = Facebook::select('id', 'title', 'description', 'image')->orderby('id','desc')->get()->toArray();
        foreach ($Facebook as $key => $value) {
        	$data['Facebook'][$key] = $value;
        }
        $Posts = Posts::select('id', 'title', 'description', 'images')->orderby('id','desc')->get()->toArray();
        foreach ($Posts as $key => $value) {
        	$data['Posts'][$key] = $value;
        }
        return($data);

        //fetch data of facebook posts
        // $fb_posts = Posts::select('*')->orderBy('id','desc')->get()->toArray(); 
        // print_r("Facebook Posts..");
        // print_r($fb_posts);
        
    }
}
