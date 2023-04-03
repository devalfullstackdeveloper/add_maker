<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GalleryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\IpostsController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\FbookController;
use App\Http\Controllers\BussinessCardController;

use App\Http\Controllers\eventController;
use App\Http\Controllers\twitterController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\youtubeController;
use App\Http\Controllers\instagramController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    Route::get('google',function(){

    return view('googleAuth');
        
    });

Route::get('index',function(){
    return view('index');
});

Route::get('log',function(){
    return view('loginpage');
});

Route::get('admin',function(){
    return view('adminpage');
});

Route::get('page',function(){
    return view('page');
});

Route::get('dash',function(){
    return view('dashboard');
});

Route::get('ind',function(){
    return view('industry.index');
});

    
Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post');

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);        
//Route::get('auth/google/callback',[LoginController::class, 'handleGoogleCallback']);


Route::get('auth/insta', [GalleryController::class, 'redirectToInstagramProvider']);     
Route::get('auth/insta/callback', [GalleryController::class, 'instagramProviderCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectFacebook']);
Route::get('auth/facebbok/callback', [FacebookController::class, 'facebookCallback']);

Route::get('auth/apple',[AppleLoginController::class,'appleLogin']);

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });

Route::resource('posts', PostController::class);
Route::resource('/iposts', IpostsController::class);

 Route::resource('fbook', FbookController::class);
 Route::resource('bcard', BussinessCardController::class);
  Route::post('/update/bcard/{id}', [BussinessCardController::class,'update'])->name('bcard.update');
  
//  Route::post('delete-industry', [IndustryController::class,'destroy']);
//  Route::get('admins', [IndustryController::class, 'indexs'])->name('admins.index');

 Route::resource('event', eventController::class);
Route::resource('posts', PostController::class);
Route::resource('/iposts', IpostsController::class);

Route::resource('event', eventController::class);
Route::post('update/event/{id}',[eventController::class, 'update'])->name('event.update');

Route::resource('twitter', twitterController::class);
Route::post('update/twitter/{id}',[twitterController::class, 'update'])->name('twitter.update');

Route::resource('poster', PosterController::class);
Route::post('update/poster/{id}',[PosterController::class, 'update'])->name('poster.update');

Route::resource('fbook', FbookController::class);
Route::post('/fbook_update/{id}', [FbookController::class,'update'])->name('fbook.update');


Route::resource('industry', IndustryController::class);
Route::post('/industry_update/{id}', [IndustryController::class,'update'])->name('industry.update');

Route::resource('brands', BrandController::class);  //api

Route::resource('youtube', youtubeController::class);
Route::post('update/youtube/{id}',[youtubeController::class, 'update'])->name('youtube.update');

Route::resource('instagram', instagramController::class);
Route::post('update/instagram/{id}',[instagramController::class, 'update'])->name('instagram.update');





