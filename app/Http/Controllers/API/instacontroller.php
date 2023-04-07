<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Instagram;
use Illuminate\Http\Request;

class InstaController extends Controller
{
    
    public function insta()
    {
        $user = Instagram::select('*')->get();
         return ($user);
    }

}