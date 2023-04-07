<?php

namespace App\Http\Controllers\Api;
use App\Models\Iposts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FetchIpostController extends Controller
{
    public function ipost()
    {
        $insta = Iposts::select('*')->get()->toArray(); 
        return($insta);
    }
}