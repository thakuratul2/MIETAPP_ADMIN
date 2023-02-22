<?php

use App\Http\Controllers\user_login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel;

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

Route::get('/',[user_login::class,'index']);
Route::get('/dashboard',[AdminPanel::class,'admin']);
Route::post('/dashboard',[AdminPanel::class,'admin']);

