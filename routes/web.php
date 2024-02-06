<?php

use App\Http\Controllers\Admin\AboutMenuController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController as Blog;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DoctorImageController;
use App\Http\Controllers\Admin\HeadDoctorController;
use App\Http\Controllers\Admin\IconController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TvProgramController;
use App\Http\Controllers\Admin\YoutubeController;
use App\Http\Controllers\Front\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.user');
    Route::get('/contacts', [AdminController::class, 'showContactMessages'])->name('admin.contact');

    Route::get('/dentnis/dashboard',[AdminController::class,'index'])->name('admin.main');

    Route::resource('/sliders', SliderController::class)->names('admin.slider');
    Route::put('/sliders/{slider}', [SliderController::class,'update'])->name('admin.slider.edits');

    Route::resource('/youtubes', YoutubeController::class)->names('admin.youtube');
    Route::put('/youtubes/{youtube}', [SliderController::class,'update'])->name('admin.youtube.edits');

    Route::resource('/icons', IconController::class)->names('admin.icon');
    Route::put('/icons/{icon}', [IconController::class,'update'])->name('admin.icon.edits');

    Route::resource('/images', DoctorImageController::class)->names('admin.d_image');
    Route::put('/doctor-images/{image}', [DoctorImageController::class,'update'])->name('admin.d_image.edits');


    Route::resource('/sponsors', SponsorController::class)->names('admin.sponsor');
    Route::put('/sponsors/{sponsor}', [SponsorController::class,'update'])->name('admin.sponsor.edits');

    Route::resource('/tv-programs', TvProgramController::class)->names('admin.program');
    Route::put('/tv-programs/{program}', [TvProgramController::class,'update'])->name('admin.program.edits');

    Route::resource('/settings', SettingController::class)->names('admin.setting');
    Route::put('/settings/{setting}', [SettingController::class,'update'])->name('admin.setting.edits');

    Route::resource('/languages', LanguageController::class)->names('admin.language');
    Route::put('/languages/{language}', [LanguageController::class,'update'])->name('admin.language.edits');

    Route::get('/categories/{lang}', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category-create', [CategoryController::class, 'store']);
    Route::get('/category-edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category-edit/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category-delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');


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

    Route::get('/quotes/{lang}', [QuoteController::class, 'index'])->name('admin.quotes.index');
    Route::get('/quotes-create', [QuoteController::class, 'create'])->name('admin.quotes.create');
    Route::post('/quotes-create', [QuoteController::class, 'store'])->name('admin.quotes.store');
    Route::get('/quotes-edit/{quote}', [QuoteController::class, 'edit'])->name('admin.quotes.edit');
    Route::put('/quotes-edit/update', [QuoteController::class, 'update'])->name('admin.quotes.update');
    Route::delete('/quotes-delete/{quote}', [QuoteController::class, 'destroy'])->name('admin.quotes.destroy');


    Route::get('/about_menu/{lang}', [AboutMenuController::class, 'index'])->name('admin.about_menu.index');
    Route::get('/about_menu-create', [AboutMenuController::class, 'create'])->name('admin.about_menu.create');
    Route::post('/about_menu-create', [AboutMenuController::class, 'store'])->name('admin.about_menu.store');
    Route::get('/about_menu-edit/{menu}', [AboutMenuController::class, 'edit'])->name('admin.about_menu.edit');
    Route::put('/about_menu-edit/update', [AboutMenuController::class, 'update'])->name('admin.about_menu.update');
    Route::delete('/about_menu-delete/{menu}', [AboutMenuController::class, 'destroy'])->name('admin.about_menu.destroy');


    Route::get('/about/{lang}', [AboutUsController::class, 'index'])->name('admin.about.index');
    Route::get('/about-create', [AboutUsController::class, 'create'])->name('admin.about.create');
    Route::post('/about-create', [AboutUsController::class, 'store'])->name('admin.about.store');
    Route::get('/about-edit/{about}', [AboutUsController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about-edit/update', [AboutUsController::class, 'update'])->name('admin.about.update');
    Route::delete('/about-delete/{about}', [AboutUsController::class, 'destroy'])->name('admin.about.destroy');


    Route::get('/head-doctor/{lang}', [HeadDoctorController::class, 'index'])->name('admin.doctor.index');
    Route::get('/doctor-create', [HeadDoctorController::class, 'create'])->name('admin.doctor.create');
    Route::post('/doctor-create', [HeadDoctorController::class, 'store'])->name('admin.doctor.store');
    Route::get('/doctor-edit/{doctor}', [HeadDoctorController::class, 'edit'])->name('admin.doctor.edit');
    Route::put('/doctor-edit/update', [HeadDoctorController::class, 'update'])->name('admin.doctor.update');
    Route::delete('/doctor-delete/{doctor}', [HeadDoctorController::class, 'destroy'])->name('admin.doctor.destroy');



});
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('front.search');

Route::get('/change-language/{language}', [BlogController::class, 'changeLanguage']);
Route::get('/',[BlogController::class,'index'])->name('front.main');
Route::get('/about',[BlogController::class,'about'])->name('front.about');
Route::get('/tv-programlari',[BlogController::class,'tvPrograms'])->name('front.tv_program');
Route::get('/drabdullkadir-narin',[BlogController::class,'doctorPageShow'])->name('front.dr_narin');
Route::get('/makaleler',[BlogController::class,'article'])->name('front.article');
Route::get('/contact',[BlogController::class,'contact'])->name('front.contact');
Route::post('/contact',[BlogController::class,'addContact']);
Route::get('/{slug}',[BlogController::class,'singlePage']);



