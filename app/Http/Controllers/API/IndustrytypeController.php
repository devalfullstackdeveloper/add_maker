<?php
  
namespace App\Http\Controllers\API;
  
use Illuminate\Support\Facades\Http;
use App\Models\industry;
use App\Http\Controllers\Controller;

  
class IndustrytypeController extends Controller
{
    public function index()
    {
        $user = industry::select('*')->get();
        return ($user);
    }
     public function select($id)
    {
      $idd = industry::find($id);
      return ($idd);
    }
}







































 