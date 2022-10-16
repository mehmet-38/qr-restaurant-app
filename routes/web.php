<?php

use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\GuestController;
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


Route::group(["prefix"=>"admin","middleware"=>["auth","can:isAdmin","verified"]],function(){
    Route::get("home",[AdminController::class,'home'])->name("a-home");
});

Route::get('/', function () {
    return view('auth.login');
});
Route::get("guest/Index",[GuestController::class,"Index"]);

require __DIR__.'/auth.php';
