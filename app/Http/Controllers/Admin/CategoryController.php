<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $adminCategories = Category::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();

//        dd($categories);

        return view('Admin.pages.category.index', compact('adminCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $languages = config('app.languages');

        foreach ($languages as $lang) {
            $validationRules["$lang.title"] = 'required|string|max:255';
        }
        $request->validate($validationRules);
        $category = new Category();
        $category->save();

        foreach ($languages as $lang) {

            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;
            CategoryTranslation::create([
                'name' => $request->input("$lang.title"),
                'language_id' => $langId,
                'category_id' => $category->id
            ]);
        }

        return redirect()->route('admin.category.index', ['lang' => 'en'])->with('success', 'Category Item created successfully');
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
    public function edit(Category $category)
    {
        return view('Admin.pages.category.edit', compact('category'));
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

        $category = Category::find($request->input('category_id'));

        foreach ($languages as $lang) {
            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;

            // Kategori çevirisini güncellemek yerine oluşturun
            $categoryTranslation = CategoryTranslation::updateOrCreate(
                [
                    'language_id' => $langId,
                    'category_id' => $request->input('category_id'),
                ],
                [
                    'name' => $request->input("$lang.title"),
                ]
            );
        }

        return redirect()->route('admin.category.index', ['lang' => 'en'])
            ->with('success', 'Category item created or updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->translations()->delete();

            $category->delete();

            return redirect()->back()->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }    }
}
