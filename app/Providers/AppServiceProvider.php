<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Language;
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
        view()->composer(['Front.*', 'Admin.*'], function($view){
            $lang = session()->get('language', 'tr');
            App::setLocale($lang);

//            $lang = 'tr';
//            $categories = Category::with(['translations', 'blogs.translations'])->get();

            $categoriesAll = Category::with([
                'translations' => function ($query) use ($lang) {
                    $query->whereHas('language', function ($subquery) use ($lang) {
                        $subquery->where('lang', $lang);
                    });
                },
                'blogs.translations' => function ($query) use ($lang) {
                    $query->whereHas('language', function ($subquery) use ($lang) {
                        $subquery->where('lang', $lang);
                    });
                },
            ])->get();
            $currentLocale = App::currentLocale();
            $blogsGeneral = Blog::with(['translations' => function ($query) use ($lang) {
                $query->whereHas('language', function ($subquery) use ($lang) {
                    $subquery->where('lang', $lang);
                });
            }])->get();
//            dd($lang);

            $languages=Language::all();
            $view->with(compact('categoriesAll', 'lang', 'blogsGeneral','languages'));
        });
    }
}
