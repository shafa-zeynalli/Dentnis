<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('Front.*', function($view){
            $categories = Category::with(['translations', 'blogs.translations'])->get();
            $currentLocale = App::currentLocale();
            $lang = session()->get('language', 'tr');

            return $view->with(compact('categories', 'lang'));
        });
    }
}
