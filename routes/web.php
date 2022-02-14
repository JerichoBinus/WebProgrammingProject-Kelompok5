<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[UserController::class,'showHome']);

Route::get('/founder',[UserController::class,'showFounder']);

Route::get('/login',[UserController::class,'showLogin']);
Route::post('/login',[UserController::class,'login'])->middleware('guest');

Route::get('/logout',[UserController::class, 'logout'])->middleware('auth');

Route::get('/register',[UserController::class,'showRegister'])->middleware('guest');
Route::post('/register',[UserController::class,'register']);

Route::get('/{auth}',[UserController::class,'showProfile'])->middleware('auth');

Route::get('/{auth}/update',[UserController::class,'edit'])->middleware('auth');
Route::post('/{auth}',[UserController::class,'update'])->middleware('auth');


Route::get('/{auth}/package',[UserController::class,'showPackage'])->middleware('auth');
Route::post('/{auth}/package/remove',[UserController::class,'removepackage'])->middleware('auth');



Route::get('/{auth}/confirm/{id}',[UserController::class,'confirmbuy'])->middleware('auth');
Route::post('/{auth}/package/{id}',[UserController::class,'buy'])->middleware('auth');


//Route::post('/{auth}',[UserController::class,'buypackage'])->middleware('auth');
