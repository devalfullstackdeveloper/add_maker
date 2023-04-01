<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\user_industry;
use Validator;
use DB;

class user_industryController extends Controller
{
    public function user_i()
    {
        $user = user_industry::select('*')->get();
        return ($user);
    }

    public function store(Request $request)
    {

     $input = $request->all();
      foreach ($input['industry'] as  $value) 
      {
        $user_industry = user_industry::create([
            'industry_id'=>$value['industry_id'],
            'userid'=>$input['userid'],
            'description'=>$value['description'],
        ]);
      
    }    
   }
}

        
    
       
     

   

