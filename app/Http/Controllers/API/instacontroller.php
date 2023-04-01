<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\instagram;
use Illuminate\Http\Request;

class instacontroller extends Controller
{
    
    public function insta()
    {
        $user = instagram::select('*')->get();
         return ($user);
    }

}
