<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Http;
use App\Models\Industry;
use App\Http\Controllers\Controller;


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
