<?php

namespace App\Http\Controllers;
use App\Models\BusinessCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BcardController extends Controller
{
    public function bcard()
    {
        $user = BusinessCard::select('*')->get()->toArray(); 
        return($user);
    }
}