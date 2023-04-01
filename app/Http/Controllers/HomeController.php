<?php

namespace App\Http\Controllers;
use App\Models\business_card;
use App\Models\upcomingevents;
use App\Models\Facebook;
use App\Models\Industry;
use App\Models\twitter;
use App\Models\Iposts;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller  
{
    public function home()
    {
    	//$business_card =  DB::table('business_card')->get()->toArray();
        $business_card=business_card::select('id', 'description', 'image', 'date')->get()->toArray();
        $data = array();
        foreach ($business_card as $key => $value) {
        	$data['business_card'][$key] = $value;
        }

        $upcomingevents =  upcomingevents::select('id', 'title', 'description', 'icon', 'date')->get()->toArray();
        foreach ($upcomingevents as $key => $value) {
        	$data['upcomingevents'][$key] = $value;
        }

        $Facebook =  Facebook::select('id', 'title', 'description', 'image')->get()->toArray();
        foreach ($Facebook as $key => $value) {
        	$data['Facebook'][$key] = $value;
        }

        $Industry =  Industry::select('id', 'industry_type', 'description', 'industry_image')->get()->toArray();
        foreach ($Industry as $key => $value) {
        	$data['Industry'][$key] = $value;
        }

        $twitter =  twitter::select('id', 'title', 'description', 'image', 'date')->get()->toArray();
        foreach ($twitter as $key => $value) {
        	$data['twitter'][$key] = $value;
        }

         $Iposts =  Iposts::select('id', 'title', 'description', 'images')->get()->toArray();
        foreach ($Iposts as $key => $value) {
        	$data['Iposts'][$key] = $value;
        }

        $Posts =  Posts::select('id', 'title', 'description', 'images')->get()->toArray();
        foreach ($Posts as $key => $value) {
        	$data['Posts'][$key] = $value;
        }
        return($data);
    }
}