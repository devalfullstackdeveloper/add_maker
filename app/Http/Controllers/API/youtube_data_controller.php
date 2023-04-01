<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\youtube;
use Illuminate\Http\Request;

class youtube_data_controller extends Controller
{
    public function youtube()
    {
        $user = youtube::select('*')->get();
          return ($user);
    }
}
