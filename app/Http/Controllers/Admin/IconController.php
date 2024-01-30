<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use App\Models\Slider;
use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IconController extends Controller
{
    public function index()
    {
        $icons = Icon::all();
        return view('Admin.pages.icon.index', compact('icons'));
    }

    public function create()
    {
        return view('Admin.pages.icon.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048'
        ]);

        Icon::create([
            'url' => $request->input('url'),
            'image' => $request->file('image')->store('icon_images', 'public'),

        ]);

        return redirect()->route('admin.icon.index')->with('success', 'Icon Item added successfully!');
    }

    public function edit(Icon $icon)
    {
        return view('Admin.pages.icon.edit', compact('icon'));
    }

    public function update(Request $request, Icon $icon)
    {
        $request->validate([
            'url' => 'required',
        ]);
//        dd($request->all());
        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($icon->image)) {
                Storage::disk('public')->delete($icon->image);

            }
            $icon->image = $request->file('image')->store('icon_images', 'public');
        }
        $icon->url = $request->input('url');
        $icon->save();

        return redirect()->route('admin.icon.index')->with('success', 'Icon Item updated successfully!');
    }

    public function destroy(Icon $icon)
    {
        $icon->delete();
        return redirect()->route('admin.icon.index')->with('success', 'Icon Item deleted successfully!');
    }
}




