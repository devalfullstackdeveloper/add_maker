<?php

namespace App\Http\Controllers;
use App\Models\business_card;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BcardController extends Controller
{
    public function bcard()
    {
        $user = business_card::select('*')->get()->toArray(); 
        return($user);
    }
}