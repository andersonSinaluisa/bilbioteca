<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1/auth'

], function ($router) {
    Route::post('login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\Api\V1\AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [\App\Http\Controllers\Api\V1\AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [\App\Http\Controllers\Api\V1\AuthController::class, 'me'])->name('me');
});


Route::group([
    'middleware'=>'api',
    'prefix'=>'v1/books'
],function($router){
    Route::get('/',[\App\Http\Controllers\Api\V1\BookController::class,'index'])->name('books.index');
    Route::get('/{id}',[\App\Http\Controllers\Api\V1\BookController::class,'show'])->name('books.show');
    Route::post('/',[\App\Http\Controllers\Api\V1\BookController::class,'store'])->name('books.store');
    Route::put('/{id}',[\App\Http\Controllers\Api\V1\BookController::class,'update'])->name('books.update');
    Route::delete('/{id}',[\App\Http\Controllers\Api\V1\BookController::class,'destroy'])->name('books.destroy');

});


Route::group([
    'middleware'=>'api',
    'prefix'=>'v1/categories'
],function($router){

    Route::get('/',[\App\Http\Controllers\Api\V1\CategoryController::class,'index'])->name('categories.index');
    Route::get('/{id}',[\App\Http\Controllers\Api\V1\CategoryController::class,'show'])->name('categories.show');
    Route::post('/',[\App\Http\Controllers\Api\V1\CategoryController::class,'store'])->name('categories.store');
    Route::put('/{id}',[\App\Http\Controllers\Api\V1\CategoryController::class,'update'])->name('categories.update');
    Route::delete('/{id}',[\App\Http\Controllers\Api\V1\CategoryController::class,'destroy'])->name('categories.destroy');
});