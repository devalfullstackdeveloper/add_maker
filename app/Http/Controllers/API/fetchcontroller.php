<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\upcomingevents;

class fetchcontroller extends Controller
{
    public function fetch()
    { 
        $user = upcomingevents::select('*')->get();
        return ($user);
    
    }

}
