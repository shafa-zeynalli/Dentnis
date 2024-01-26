<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController as Blog;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Front\BlogController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dentnis/dashboard',[AdminController::class,'index'])->name('admin.main');

    Route::resource('/sliders', SliderController::class)->names('admin.slider');
    Route::put('/sliders/{slider}', [SliderController::class,'update'])->name('admin.slider.edits');

    Route::resource('/sponsors', SponsorController::class)->names('admin.sponsor');
    Route::put('/sponsors/{sponsor}', [SponsorController::class,'update'])->name('admin.sponsor.edits');

    Route::get('/categories/{lang}', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category-create', [CategoryController::class, 'store']);
    Route::get('/category-edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category-edit/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category-delete/{category}', [TeamController::class, 'delete'])->name('admin.category.destroy');


    Route::get('/teams/{lang}', [TeamController::class, 'index'])->name('admin.teams.index');
    Route::get('/teams-create', [TeamController::class, 'create'])->name('admin.teams.create');
    Route::post('/teams-create', [TeamController::class, 'store'])->name('admin.teams.store');
    Route::get('/teams-edit/{team}', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::post('/teams-edit/update', [TeamController::class, 'update'])->name('admin.teams.update');
    Route::delete('/teams-delete/{team}', [TeamController::class, 'delete'])->name('admin.teams.destroy');

    Route::get('/blogs/{lang}', [Blog::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs-create', [Blog::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs-create', [Blog::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs-edit/{blog}', [Blog::class, 'edit'])->name('admin.blogs.edit');
    Route::post('/blogs-edit/update', [Blog::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs-delete/{blog}', [Blog::class, 'destroy'])->name('admin.blogs.destroy');

});



Route::get('/',[BlogController::class,'index'])->name('front.main');
Route::get('/about',[BlogController::class,'about'])->name('front.about');
Route::get('/contact',[BlogController::class,'contact'])->name('front.contact');
Route::get('/article',[BlogController::class,'article']);
Route::get('/tv-programs',[BlogController::class,'tvPrograms']);
Route::get('/change-language/{language}', [BlogController::class, 'changeLanguage']);
Route::get('/{lang}/{slug}',[BlogController::class,'singlePage']);



