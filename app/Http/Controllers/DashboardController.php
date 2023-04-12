<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpcomingEvents;

class DashboardController extends Controller
{
   public function UpcomingEvents() 
   {

     $upcomingevents_data = upcomingevents::select('title','icon')->limit(4)->orderBy('date', 'ASC')->get();
     return view('dashboard',compact('upcomingevents_data'));

      // echo "<pre>";
      //   print_r( $upcomingevents);
      //   echo "</pre>";
      //   exit();
   }
}
