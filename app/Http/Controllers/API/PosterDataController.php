<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;

class PosterDataController extends Controller
{

    public function poster()
    {

        $user = Poster::select('*')->get();
        return ($user);
    }
}
