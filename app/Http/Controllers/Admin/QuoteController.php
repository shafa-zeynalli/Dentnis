<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Quote;
use App\Models\QuotesTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $quotes = Quote::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();

        $rowCount = Quote::count();
        return view('Admin.pages.quote.index', compact('quotes','rowCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('Admin.pages.quote.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $languages = config('app.languages');
        $validationRules = [
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ];

        foreach ($languages as $lang) {
            $validationRules["$lang.title"] = 'required|string|max:255';
            $validationRules["$lang.description"] = 'required|string';
        }
        $request->validate($validationRules);

//        dd($request->all());
//        dd($slug);

        $quote = new Quote();
        $quote->image = $request->file('image')->store('quote_images', 'public');


        $quote->save();

        foreach ($languages as $lang) {

            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;
            QuotesTranslation::create([
                'quote_id' => $quote->id,
                'language_id' => $langId,
                'title' => $request->input("$lang.title"),
                'description' => $request->input("$lang.description"),
            ]);
        }

        return redirect()->route('admin.quotes.index', ['lang' => 'en'])->with('success', 'Quote Item created successfully');
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
    public function edit(Quote  $quote)
    {
        return view('Admin.pages.quote.edit', compact('quote'));

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
            $validationRules["$lang.description"] = 'required|string';
        }
        $request->validate($validationRules);
//        dd('request',$request->all());

        $quote = Quote::find($request->input('quote_id'));

        // Eğer yeni kayıt ise dosyayı kaydet
        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($quote->image)) {
                Storage::disk('public')->delete($quote->image);

            }
            $quote->image = $request->file('image')->store('quote_images', 'public');
        }

        $quote->save();

        foreach ($languages as $lang) {
            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;

            QuotesTranslation::updateOrCreate([
                'quote_id' => $quote->id,
                'language_id' => $langId,
            ], [
                'title' => $request->input("$lang.title"),
                'description' => $request->input("$lang.description"),
            ]);
        }

        return redirect()->route('admin.quotes.index', ['lang' => 'en'])->with('success', 'Quote Item  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        if ($quote) {
            $quote->translations()->delete();

            if (Storage::disk('public')->exists($quote->image)) {
                Storage::disk('public')->delete($quote->image);

            }
            $quote->delete();

            return redirect()->back()->with('success', 'Quote Item deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Quote Item not found.');
        }
    }
}
