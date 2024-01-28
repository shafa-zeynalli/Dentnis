<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use App\Models\Quote;
use App\Models\Slider;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function changeLanguage($language){
        session()->put('language', $language);
//        session()->keep(['language']);

        App::setLocale($language);
        $locale = App::currentLocale();
//        dd($locale);
        return redirect()->route('front.main');
//        return redirect()->route('front.main');
    }


    public function index()
    {
        $locale = App::currentLocale();
//        dd($locale);
//        session()->flush();
        $lang = session()->get('language', 'tr');
//        dd($lang);
        $sliders = Slider::get();

        $quotes = Quote::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();

//        $quotes = Quote::with('translations')->get();

        $sponsors = Sponsor::get();
        $youtube = Youtube::get();

        $teams = Team::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();

        $blogs = Blog::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->inRandomOrder()->limit(9)->get();
//        $blogs = Blog::with('translations')->get();
//        dd($lang, $teams);
        return view('Front.pages.main', compact('sliders', 'quotes','sponsors', 'youtube','teams', 'blogs'));
    }

    public function singlePage( $slug)
    {
//        dd($slug);
        $lang = session()->get('language', 'tr');
        $blogItem =  Blog::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->where('slug',$slug)->get();

        $blogs= Blog::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->inRandomOrder()->limit(3)->get();
//        dd($blogs);
        return view('Front.pages.singlePage', compact('blogItem','blogs'));
    }

    public function about()
    {
        return view('Front.pages.about');
    }

    public function contact()
    {
        return view('Front.pages.contact');
    }

    public function tvPrograms()
    {
        return view('Front.pages.tv-programs');
    }

    public function article()
    {
        return view('Front.pages.articles');
    }


    public function ass(){
        dd('yes');
        return view('Layouts.admin');
    }


}
