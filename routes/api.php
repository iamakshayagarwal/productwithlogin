<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);


Route::group(['middleware' =>['auth:sanctum']],function()
{
    Route::get('/posts',[ProductController::class,'index']);

Route::post('/post',[ProductController::class,'store']);

Route::get('/posts/{id}',[ProductController::class,'show']);

Route::put('/posts/{id}',[ProductController::class,'update']);

Route::delete('/posts/{id}',[ProductController::class,'destroy']);

Route::post('/logout',[ProductController::class,'logout']);

});