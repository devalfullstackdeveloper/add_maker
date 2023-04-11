<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeDataController extends Controller
{
    public function youtube()
    {
        $user = Youtube::select('*')->get();
        return ($user);
    }
}
