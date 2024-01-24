<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Category;
use App\Models\Language;
use App\Models\Team;
use App\Models\TeamTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $blogs = Blog::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();
        return view('Admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

        $categories = Category::with('translations')->get();
//        dd($categories);
        return view('Admin.pages.blog.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $languages = config('app.languages');
        $validationRules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "category" => 'required'
        ];

        foreach ($languages as $lang) {
            $validationRules["$lang.title"] = 'required|string|max:255';
            $validationRules["$lang.description"] = 'required|string';
        }
        $request->validate($validationRules);
        $slug= Str::slug($request->input('tr.title'));

//        dd($request->all());
//        dd($slug);

        $blog = new Blog();
        $blog->image = $request->file('image')->store('blog_images', 'public');
        $blog->slug = $slug;
        $blog->category_id = $request->input('category');


        $blog->save();

        foreach ($languages as $lang) {

            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;
            BlogTranslation::create([
                'blog_id' => $blog->id,
                'language_id' => $langId,
                'title' => $request->input("$lang.title"),
                'description' => $request->input("$lang.description"),
            ]);
        }

        return redirect()->route('admin.blogs.index', ['lang' => 'en'])->with('success', 'Blog member created successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
