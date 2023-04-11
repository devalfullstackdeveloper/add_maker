<?php

namespace App\Http\Controllers\Api;

use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FetchPostController extends Controller
{
    public function index()
    {
        $post = Posts::select('*')->get()->toArray();
        return ($post);
    }
}
