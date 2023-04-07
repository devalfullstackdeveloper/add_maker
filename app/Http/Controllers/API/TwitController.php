<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Twitter;


class TwitController extends Controller
{

    public function twitter()
    {
          $user = Twitter::select('*')->get();
          return ($user);
    }

    
}
