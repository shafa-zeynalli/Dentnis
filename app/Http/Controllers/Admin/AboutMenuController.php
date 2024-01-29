<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMenu;
use App\Models\AboutMenuTranslation;
use App\Models\Category;
use App\Models\Language;
use App\Models\Quote;
use App\Models\QuotesTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $menus = AboutMenu::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();

        $rowCount = AboutMenu::count();
        return view('Admin.pages.about_menu.index', compact('menus', 'rowCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('Admin.pages.about_menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $languages = config('app.languages');
        $validationRules = [];

        foreach ($languages as $lang) {
            $validationRules["$lang.title"] = 'required|string|max:255';
        }
        $request->validate($validationRules);

//        dd($request->all());
//        dd($slug);
        $slug = Str::slug($request->input('tr.title'));

        $menus = new AboutMenu();
        $menus->slug = $slug;
        $menus->save();
        foreach ($languages as $lang) {
            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;
            AboutMenuTranslation::create([
                'about_menu_id' => $menus->id,
                'language_id' => $langId,
                'title' => $request->input("$lang.title"),
            ]);
        }

        return redirect()->route('admin.about_menu.index', ['lang' => 'en'])->with('success', 'About Menu Item created successfully');
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
    public function edit(AboutMenu $menu)
    {
        return view('Admin.pages.about_menu.edit', compact('menu'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $languages = config('app.languages');
        $validationRules = [];
        foreach ($languages as $lang) {
            $validationRules["$lang.title"] = 'required|string|max:255';
        }
        $request->validate($validationRules);
//        dd('request',$request->all());
        $menu = AboutMenu::find($request->input('about_menu_id'));
        $slug = Str::slug($request->input('tr.title'));
        $menu->slug = $slug;
        $menu->save();
        foreach ($languages as $lang) {
            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;
            AboutMenuTranslation::updateOrCreate([
                'about_menu_id' => $menu->id,
                'language_id' => $langId,
            ], [
                'title' => $request->input("$lang.title"),
            ]);
        }
        return redirect()->route('admin.about_menu.index', ['lang' => 'en'])->with('success', 'About Menu Item  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutMenu $menu)
    {
        if ($menu) {
            $menu->translations()->delete();
            $menu->delete();

            return redirect()->back()->with('success', 'About Menu Item deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'About Menu Item not found.');
        }
    }
}
