<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\Front\BlogController::class,'index'])->name('front.main');
Route::get('/about',[\App\Http\Controllers\Front\BlogController::class,'about'])->name('front.about');
Route::get('/contact',[\App\Http\Controllers\Front\BlogController::class,'contact'])->name('front.contact');
Route::get('/article',[\App\Http\Controllers\Front\BlogController::class,'article']);
Route::get('/tv-programs',[\App\Http\Controllers\Front\BlogController::class,'tvPrograms']);
Route::get('/change-language/{language}', [\App\Http\Controllers\Front\BlogController::class, 'changeLanguage']);
Route::get('/{slug}',[\App\Http\Controllers\Front\BlogController::class,'singlePage']);
