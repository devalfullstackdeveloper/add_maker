<?php

namespace App\Http\Controllers\Api;
use App\Models\Iposts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FetchipostController extends Controller
{
    public function ipost()
    {
        $insta = Iposts::select('*')->get()->toArray(); 
        return($insta);
    }
}