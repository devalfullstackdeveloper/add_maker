<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\twitter;


class TwitController extends Controller
{

    public function twitter()
    {
          $user = twitter::select('*')->get();
          return ($user);
    }

    
}
