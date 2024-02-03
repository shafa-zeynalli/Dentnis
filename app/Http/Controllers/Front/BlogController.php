<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Contact;
use App\Models\DoctorImage;
use App\Models\HeadDoctor;
use App\Models\Language;
use App\Models\Quote;
use App\Models\Slider;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\TvProgram;
use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function changeLanguage($language)
    {
        session()->put('language', $language);
//        session()->keep(['language']);

        App::setLocale($language);
        $locale = App::currentLocale();
//        dd($locale);
        return redirect()->back();
        return redirect()->route('front.main');
    }


    public function index()
    {
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
        return view('Front.pages.main', compact('sliders', 'quotes', 'sponsors', 'youtube', 'teams', 'blogs'));
    }

    public function singlePage($slug)
    {
//        dd($slug);
        $lang = session()->get('language', 'tr');
        $blogItem = Blog::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->where('slug', $slug)->get();

        $blogs = Blog::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->inRandomOrder()->limit(3)->get();
//        dd($blogs);
        return view('Front.pages.singlePage', compact('blogItem', 'blogs'));
    }

    public function about()
    {
        $lang = session()->get('language', 'tr');
        $about = AboutUs::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();
        $images = DoctorImage::all();
        return view('Front.pages.about', compact('about','images'));
    }
    public function doctorPageShow()
    {
        $lang = session()->get('language', 'tr');
        $about = HeadDoctor::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();
        $images = DoctorImage::all();
        return view('Front.pages.doctor_page', compact('about','images'));
    }

    public function contact()
    {
        return view('Front.pages.contact');
    }
    public function addContact(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'kvkk' => 'required',
        ]);
//        dd($request->all());
        Contact::create([
            'full_name'=> $request->input('full_name'),
                'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'subject' =>$request->input('subject'),
        'message' =>$request->input('message'),
        ]);
        return redirect()->back()->with('success','İletişim bilgileriniz başarıyla gönderildi.');
    }

    public function tvPrograms()
    {
        $programs = TvProgram::all();
        return view('Front.pages.tv-programs', compact('programs'));
    }

    public function article()
    {
        $lang = session()->get('language', 'tr');

        $blogs = Blog::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();
//        dd($blogs);
        return view('Front.pages.articles', compact('blogs'));
    }


}
