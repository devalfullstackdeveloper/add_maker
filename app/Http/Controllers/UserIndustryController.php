
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\UserIndustry;
use Validator;
use DB;

class UserIndustryController extends Controller
{
    public function user_i()
    {
        $user = UserIndustry::select('*')->get();
        return ($user);
    }

    public function store(Request $request)
    {

     $input = $request->all();
      foreach ($input['industry'] as  $value) 
      {
        $user_industry = UserIndustry::create([
            'industry_id'=>$value['industry_id'],
            'userid'=>$input['userid'],
            'description'=>$value['description'],
        ]);
      
    }    
   }
}

        
    
       
     

   

