<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
//public
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);


//Protect route

Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::post('logout',[AuthController::class,'logout']);
    Route::resource('products',ProductController::class);
});
// Route::resource('products',ProductController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
