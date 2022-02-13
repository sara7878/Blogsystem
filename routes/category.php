<?php

use App\Http\Controllers\CategoryController;

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

// Route::get('/categories',[CategoryController::class,'list'])->name('categories.list')->middleware(['auth','isAdmin']);
Route::get('/categories',[CategoryController::class,'list'])->name('categories.list')->middleware(['auth','isAdmin']);
Route::get('/createCategory',[CategoryController::class,'create'])->name('categories.create')->middleware(['auth','isAdmin','age_30']);
Route::post('/storeCategory',[CategoryController::class,'store'])->name('categories.store');
Route::delete('/deleteCategory/{id}',[CategoryController::class,'delete'])->name('categories.delete');
Route::get('/updateformCategory/{id}',[CategoryController::class,'updateform'])->name('categories.updateform');
Route::put('/updateCategory/{id}',[CategoryController::class,'update'])->name('categories.update');
// Route::update('/updateCategory/{id}',[CategoryController::class,'update'])->name('categories.update');

// Route::post('/categories/articals',[CategoryController::class,'update'])->name('categories.update');
