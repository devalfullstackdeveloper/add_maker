<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuApiController extends Controller
{
    //
    public function fetch_menu()
    {
        $product = Menu::all();
        return response()->json([
        "success" => true,
        "message" => "Menu",
        "data" => $product
        ]);
        
    }
}
