<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UpcomingEvents;

class FetchController extends Controller
{
    public function fetch()
    { 
        $user = UpcomingEvents::select('*')->get();
        return ($user);
    
    }

}
