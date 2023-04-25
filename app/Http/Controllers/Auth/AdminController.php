<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
class AdminController extends Controller
{
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = DB::table("users")
        ->where('is_admin',1)
        ->first()->firstname;
        $request->session()->put('firstname',$admin);

        $credentials = $request->only('firstname','email', 'password');

        $credentials = $request->only('email', 'password','is_admin');

        if (Auth::attempt($credentials)) {

        return redirect()->intended('dashboard')
            ->withSuccess('You have Successfully loggedin');
            
        }
  
        return redirect("admin")->withSuccess('Opps! You have entered invalid credentials');
    }
}