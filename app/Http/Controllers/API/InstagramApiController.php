<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iposts;
use App\Models\instagram;


class InstagramApiController extends Controller
{
    
    public function instagram()
    {         
    $Iposts =  Iposts::select('id', 'title', 'description', 'images')->get()->toArray();
    foreach ($Iposts as $key => $value) {
    $data['Iposts'][$key] = $value;
        }

     $instagram =  instagram::select('id', 'title', 'description', 'image','date','status')->get()->toArray();
        foreach ($instagram as $key => $value) {
         $data['instagram'][$key] = $value;
        }
       
     return($data);

      

    }
}
