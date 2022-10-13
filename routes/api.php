<?php

use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\RestaurantController;

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
// Login - Register Process
Route::post("/login",[LoginController::class,"Login"]);
Route::post("/register",[RegisterController::class,"Register"]);

// ----

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix"=>"admin","middleware"=>["auth:sanctum","role:1"]],function(){
    Route::get('users',[UserController::class,"getUserData"]);
    Route::post('users',[UserController::class,'addUserData']);
    
});

//  admin bareer token :  KFDhwo8KTqjKpBrhxjwn6aqBAWwm4VjUnlsoDN6C

// Restaurant process
Route::get('rest',[RestaurantController::class,'getRestaurantData']);
Route::post('rest',[RestaurantController::class,'addResturantData']);

// Products process
Route::post('products',[ProductController::class,'addProductsData']);

// Menu Process

Route::post('menus',[MenuController::class,"addMenusData"]);
Route::get("menus/{menus_id}",[MenuController::class,"getMenusData"]);


