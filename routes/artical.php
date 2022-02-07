<?php

use App\Http\Controllers\ArticalController;

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


Route::get('/categories/{id}/articals',[ArticalController::class,'list'])->name('categories.articles.list');
Route::get('/createArtical/{id}',[ArticalController::class,'create'])->name('articles.create');
Route::post('/storeCategory/{id}',[ArticalController::class,'store'])->name('articles.store');
Route::delete('/deleteArtical/{id}',[ArticalController::class,'delete'])->name('articles.delete');
Route::get('/updateformArtical/{id}',[ArticalController::class,'updateform'])->name('articles.updateform');
Route::post('/updateArtical/{id}',[ArticalController::class,'update'])->name('articles.update');
