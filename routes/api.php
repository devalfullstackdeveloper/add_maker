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
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\MenuApiController;




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
Route::post('/register', [App\Http\Controllers\API\AdminApiController::class, 'register']);

//api for login
Route::post('/login',[App\Http\Controllers\API\AdminApiController::class, 'login']);

//api for Industry

Route::get('/industry',[IndustrytypeController::class, 'index'])->middleware('auth:api');
Route::get('/select_industry/{id}',[IndustrytypeController::class, 'select'])->middleware('auth:api');

//api for Business Card
Route::get('/card',[BcardController::class, 'bcard'])->middleware('auth:api');

//api for Home Page 
Route::get('/home',[HomeController::class, 'home'])->middleware('auth:api');


//api for Mutliple select Industry
Route::post('/user_industry',[user_industryController::class, 'store'])->middleware('auth:api');

//api for Facebook
Route::get('facebook_ad', [FacebookApiController::class, 'index'])->middleware('auth:api');

//api for Admin
Route::put('edit/{id}', [ AdminApiController::class, 'edit'])->middleware('auth:api');
Route::delete('delete/{id}', [ AdminApiController::class, 'delete'])->middleware('auth:api');

//api for  USER LOGIN using OTP
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//FETCH api for Upcomin Events 
 Route::get('/events',[fetchcontroller::class, 'fetch'])->middleware('auth:api');

 //FETCH api Twitter  
 Route::get('/twitter',[TwitController::class, 'twitter'])->middleware('auth:api');

 //FETCH api for Poster
 Route::get('/poster',[poster_data_controller::class, 'poster'])->middleware('auth:api');

 //FETCH api for Youtube 
 Route::get('/youtube',[youtube_data_controller::class, 'youtube'])->middleware('auth:api');

//api for Brand info
 Route::post('/add/brand',[BrandController::class, 'store'])->middleware('auth:api');
 Route::post('/edit/brand/{id}',[BrandController::class, 'edit'])->middleware('auth:api');


//fetching for Facebook Post
Route::get('/facebook_post',[FetchpostController::class, 'index'])->middleware('auth:api');

// fetching for Instagram Post
Route::get('/instagram_post',[FetchipostController::class, 'ipost'])->middleware('auth:api');


//fetch api of facebook ads and facebook posts 
Route::get('facebook', [FacebookApiController::class, 'facebook'])->middleware('auth:api');

//api for instagram story and instagram posts
Route::get('/instagram',[InstagramApiController::class, 'instagram'])->middleware('auth:api');

// api for contact us
Route::post('/contact_store', [contactcontroller::class, 'store'])->middleware('auth:api');

// api for instagram story
Route::get('/instagram_story', [instacontroller::class, 'insta'])->middleware('auth:api');




// api for social media in brand info
Route::resource('/media', SocialMediaController::class)->middleware('auth:api'); 
Route::post('/update/media/{id}',[SocialMediaController::class, 'update'])->middleware('auth:api');


// api for brand info
 Route::get('/add_brand', [AddBrandController::class, 'add_brand'])->middleware('auth:api');


// api for profile
Route::resource('/profile',ProfileController::class)->middleware('auth:api');

//fetch api of menu
Route::get('/menu', [MenuApiController::class, 'fetch_menu'])->middleware('auth:api');




//api for favorite
Route::post('/fav',[FavoriteController::class, 'fav'])->middleware('auth:api');

