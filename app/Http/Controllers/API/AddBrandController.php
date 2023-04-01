<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\SocialMedia;
use DB;

class AddBrandController extends Controller
{
    //
    public function add_brand()
        {
            $data=DB::table('brand')->join('socialmeadia','brand.display_media','=','socialmeadia.id')->select()->get();

            // print_r($data);exit();

            return($data);
            
        }
    
}
