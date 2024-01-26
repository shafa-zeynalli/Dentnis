<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController as Blog;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Front\BlogController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dentnis/dashboard',[AdminController::class,'index'])->name('admin.main');

    Route::resource('sliders', SliderController::class)->names('admin.slider');
    Route::put('admin/sliders/{slider}', [SliderController::class,'update'])->name('admin.slider.edits');

    Route::resource('sliders', SponsorController::class)->names('admin.sponsor');
    Route::put('admin/sliders/{slider}', [SponsorController::class,'update'])->name('admin.sponsor.edits');


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



