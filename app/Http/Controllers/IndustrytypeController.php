<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Support\Facades\Http;
use App\Models\Industry;
use App\Http\Controllers\IndustrytypeController;
  
class IndustrytypeController extends Controller
{
    public function index()
    {
        $user = Industry::select('*')->get();
        return ($user);
    }
     public function select($id)
    {
      $idd = Industry::find($id);
      return ($idd);
    }
}







































 