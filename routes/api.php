<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ArticalController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories',[CategoryController::class,'list']);
Route::get('/categories/{id}',[CategoryController::class,'getcat']);
Route::post('/storeCategory',[CategoryController::class,'store']);
Route::delete('/deleteCategory/{id}',[CategoryController::class,'delete']);
Route::put('/updateCategory/{id}',[CategoryController::class,'update']);

Route::get('/articals',[ArticalController::class,'listAll']);
Route::get('/articals/{id}',[ArticalController::class,'getcat']);
Route::post('/storeArtical',[ArticalController::class,'add']);
Route::delete('/deleteArtical/{id}',[ArticalController::class,'delete']);
Route::put('/updateArtical/{id}',[ArticalController::class,'update']);