<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\FetchpostController;
use App\Http\Controllers\API\FetchipostController;
use App\Http\Controllers\API\AuthOtpController;
use App\Http\Controllers\API\IndustrytypeController;
use App\Http\Controllers\API\BcardController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\user_industryController;
use App\Http\Controllers\API\fetchcontroller;
use App\Http\Controllers\API\TwitController;
use App\Http\Controllers\API\poster_data_controller;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\FacebookApiController;
use App\Http\Controllers\API\AdminApiController;
use App\Http\Controllers\API\youtube_data_controller;
use App\Http\Controllers\API\InstagramApiController;
use App\Http\Controllers\API\contactcontroller;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\instacontroller;
use App\Http\Controllers\API\SocialMediaController;
use App\Http\Controllers\API\AddBrandController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//api for register
Route::post('register', [RegisterController::class, 'register']);

//api for login
Route::post('/login',[AuthOtpController::class, 'login']);

//api for Industry
Route::get('/industry',[IndustrytypeController::class, 'index']);
Route::get('/select_industry/{id}',[IndustrytypeController::class, 'select']);

//api for Business Card
Route::get('/card',[BcardController::class, 'bcard']);

//api for Home Page 
Route::get('/home',[HomeController::class, 'home']);


//api for Mutliple select Industry
Route::post('/user_i',[user_industryController::class, 'store']);

//api for Facebook
Route::get('fbook', [FacebookApiController::class, 'index']);

//api for Admin
Route::put('edit/{id}', [ AdminApiController::class, 'edit']);
Route::delete('delete/{id}', [ AdminApiController::class, 'delete']);

//api for  USER LOGIN using OTP
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//FETCH api for Upcomin Events 
 Route::get('/events',[fetchcontroller::class, 'fetch']);

 //FETCH api Twitter  
 Route::get('/twitter',[TwitController::class, 'twitter']);

 //FETCH api for Poster
 Route::get('/poster',[poster_data_controller::class, 'poster']);

 //FETCH api for Youtube 
 Route::get('/youtube',[youtube_data_controller::class, 'youtube']);

//api for Brand info
 Route::post('/add/brand',[BrandController::class, 'store']);
 Route::post('/edit/brand/{id}',[BrandController::class, 'edit']);


//fetching for Facebook Post
Route::get('/displaypost',[FetchpostController::class, 'index']);

// fetching for Instagram Post
Route::get('/showpost',[FetchipostController::class, 'ipost']);


//fetch api of facebook ads and facebook posts 
Route::get('facebook', [FacebookApiController::class, 'facebook']);

//api for instagram story and instagram posts
Route::post('/instagram',[InstagramApiController::class, 'instagram']);



 // Route::post('/store', contactcontroller::class,'store');

Route::post('/store', [contactcontroller::class, 'store']);

//FETCH api for Instagram Story
Route::get('/insta', [instacontroller::class, 'insta']);


Route::post('/store', [contactcontroller::class, 'store']);

 Route::resource('/media', SocialMediaController::class); // social media api
 Route::post('/update/media/{id}',[SocialMediaController::class, 'update']);

 Route::get('/add_brand', [AddBrandController::class, 'add_brand']);

Route::resource('/profile',ProfileController::class);
Route::post('/ps', [InstagramApiController::class, 'instagram']);



