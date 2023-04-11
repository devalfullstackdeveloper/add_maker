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
use App\Http\Controllers\EventController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AllPostsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;




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

// Route::get('dash',function(){
//     return view('dashboard');
// });

Route::get('ind',function(){
    return view('industry.index');
});

//route for Admin Login to dashboard
Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post');

//route for login with Google 
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);        
//Route::get('auth/google/callback',[LoginController::class, 'handleGoogleCallback']);

//route for login with Instagram 
Route::get('auth/insta', [GalleryController::class, 'redirectToInstagramProvider']);     
Route::get('auth/insta/callback', [GalleryController::class, 'instagramProviderCallback']);

//route for login with Facebook 
Route::get('auth/facebook', [FacebookController::class, 'redirectFacebook']);
Route::get('auth/facebbok/callback', [FacebookController::class, 'facebookCallback']);

//route for login with Apple
Route::get('auth/apple',[AppleLoginController::class,'appleLogin']);

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */

//route for Admin Logout
Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });

 //route for crud Facebook Posts
Route::resource('posts', PostController::class);

 //route for crud Instagram Posts
Route::resource('/iposts', IpostsController::class);

 //route for crud Category
Route::resource('/category', CategoryController::class);

//route for crud Menu
Route::resource('/menu', MenuController::class);
Route::resource('fbook', FbookController::class);
Route::resource('bcard', BussinessCardController::class);
Route::post('/update/bcard/{id}', [BussinessCardController::class,'update'])->name('bcard.update');
  
//route for crud Upcoming Events
Route::resource('event', EventController::class);
Route::post('update/event/{id}',[EventController::class, 'update'])->name('event.update');
Route::post('changeStatus',[EventController::class, 'changeStatus']);

//route for crud Facebook Posts
Route::resource('posts', PostController::class);

//route for crud Instagram Posts
Route::resource('/iposts', IpostsController::class);


//route for crud Twitter
Route::resource('twitter', TwitterController::class);
Route::post('update/twitter/{id}',[TwitterController::class, 'update'])->name('twitter.update');

//route for crud Poster
Route::resource('poster', PosterController::class);
Route::post('update/poster/{id}',[PosterController::class, 'update'])->name('poster.update');

//route for crud Facebook Ad
Route::resource('fbook', FbookController::class);
Route::post('/fbook_update/{id}', [FbookController::class,'update'])->name('fbook.update');

//route for crud Industry
Route::resource('industry', IndustryController::class);
Route::post('/industry_update/{id}', [IndustryController::class,'update'])->name('industry.update');

Route::resource('brands', BrandController::class);  //api

//route for crud Youtube
Route::resource('youtube', YoutubeController::class);
Route::post('update/youtube/{id}',[YoutubeController::class, 'update'])->name('youtube.update');

//route for crud Instagram Stories
Route::resource('instagram', InstagramController::class);
Route::post('update/instagram/{id}',[InstagramController::class, 'update'])->name('instagram.update');

Route::get('dashboard', [DashboardController::class, 'UpcomingEvents']); 


//route for crud All posts
Route::resource('allposts', AllPostsController::class);
Route::post('update/allposts/{id}',[AllPostsController::class, 'update'])->name('allposts.update');

//route for crud User

Route::resource('allposts', AllPostsController::class);
Route::post('update/allposts/{id}',[AllPostsController::class, 'update'])->name('allposts.update');



Route::resource('user', UserController::class);
Route::post('/user_update/{id}', [UserController::class,'update'])->name('user.update');
