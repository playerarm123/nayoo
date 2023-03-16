<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\FacebookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function(){
    Route::get('/',[HomeController::class,'index']);
    Route::get('/posts',[PostController::class,'index']);
    Route::get('/posts/{post}/comments',[PostController::class,'comments']);
    Route::post('/posts',[PostController::class,'store']);
    Route::post('/posts/{post}/add-comment',[PostController::class,'addComment']);
    Route::put('/posts/{post}',[PostController::class,'update']);
    Route::delete('/posts/{post}',[PostController::class,'destroy']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('/friends',[FriendController::class,'index']);
    Route::post('/friends',[FriendController::class,'addFriend']);
    Route::delete('/friends/{id}',[FriendController::class,'removeFriend']);
});
Route::view('login','login')->name('login');
Route::view('register','register')->name('register');
Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);