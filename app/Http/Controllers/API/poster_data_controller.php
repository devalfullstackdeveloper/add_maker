<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\poster;
use Illuminate\Http\Request;

class poster_data_controller extends Controller
{
    
    public function poster()
    {

      $user = poster::select('*')->get();
          return ($user);   
    }

    
}
