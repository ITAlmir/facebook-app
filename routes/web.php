<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
})->middleware('alreadyLoggedIn');
Route::get('about', function () {
    return view('about');
})->middleware('alreadyLoggedIn');
Route::get('info', function () {
    return view('info');
})->middleware('alreadyLoggedIn');
Route::get('login', function () {
    return view('login');
})->middleware('alreadyLoggedIn');

Route::get('singup', function () {
    return view('singup');
})->middleware('alreadyLoggedIn');

Route::get('users/index', function () {
    return view('users/index');
})->middleware('alreadyLoggedIn');

Route::get('uploadImg', function () {
    return view('uploadImg');
});

Route::post('/upload',[UserController::class,'uploadThumbnail']);
Route::post('/news',[UserController::class,'uploadnews']);
Route::post('/addpostcomment',[UserController::class,'addpostcomment']);
Route::get('/delete/{id}',[UserController::class,'deleteNews']);
Route::get('/commented',[UserController::class,'uploadcomment']);
Route::get('/deleteImg/{id}',[UserController::class,'deleteImg']);
Route::get('/deletecomment/{id}',[UserController::class,'deleteComment']);


Route::resource('users','App\Http\Controllers\UserController');
Route::resource('comments','App\Http\Controllers\CommentController');

Route::post('login',[UserController::class,'logged'])->name('logged');
Route::get('/dashboard',[UserController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[UserController::class,'logout']);
Route::post('/users/{id}',[UserController::class,'show']);
