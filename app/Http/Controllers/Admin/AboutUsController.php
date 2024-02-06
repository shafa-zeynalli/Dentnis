<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\AboutUsTranslation;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Category;
use App\Models\HeadDoctor;
use App\Models\Language;
use App\Models\Team;
use App\Models\TeamTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $abouts = AboutUs::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();

        $rowCount = AboutUs::count();

//        dd($abouts);
        return view('Admin.pages.about.index', compact('abouts','rowCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('Admin.pages.about.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $languages = config('app.languages');
        $validationRules = [ ];

        foreach ($languages as $lang) {
            $validationRules["$lang.description"] = 'required|string';
        }
        $request->validate($validationRules);
//        dd($request->all());
//        dd($slug);

        $about = new AboutUs();
        $about->save();
        foreach ($languages as $lang) {

            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;
            AboutUsTranslation::create([
                'about_us_id' => $about->id,
                'language_id' => $langId,
                'description' => $request->input("$lang.description"),
            ]);
        }
        return redirect()->route('admin.about.index', ['lang' => 'en'])->with('success', 'About Item created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs  $about)
    {
//        dd($about);
        return view('Admin.pages.about.edit', compact('about'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $languages = config('app.languages');
        $validationRules = [];

        foreach ($languages as $lang) {
            $validationRules["$lang.description"] = 'required|string';
        }
        $request->validate($validationRules);
//        dd('request',$request->all());

        $about = AboutUs::find($request->input('about_id'));
        $about->save();

        foreach ($languages as $lang) {
            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;

            AboutUsTranslation::updateOrCreate([
                'about_us_id' => $about->id,
                'language_id' => $langId,
            ], [
                'description' => $request->input("$lang.description"),
            ]);
        }

        return redirect()->route('admin.about.index', ['lang' => 'en'])->with('success', 'About Item updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $about)
    {
        if ($about) {
            $about->translations()->delete();

            $about->delete();

            return redirect()->back()->with('success', 'About Item deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'About Item not found.');
        }
    }
}
