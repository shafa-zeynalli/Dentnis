<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class YoutubeController extends Controller
{
    public function index()
    {
        $youtubes = Youtube::all();
        return view('Admin.pages.youtube.index', compact('youtubes'));
    }

    public function create()
    {
        return view('Admin.pages.youtube.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
        ]);

        Youtube::create([
            'url' => $request->input('url'),
        ]);

        return redirect()->route('admin.youtube.index')->with('success', 'Youtube video added successfully!');
    }

    public function edit(Youtube $youtube)
    {
        return view('Admin.pages.youtube.edit', compact('youtube'));
    }

    public function update(Request $request, Youtube $youtube)
    {
        $request->validate([
            'url' => 'required',
        ]);
//        dd($request->all());
        $youtube->update([
                'url' => $request->input('url'),
        ]);

        return redirect()->route('admin.youtube.index')->with('success', 'Youtube video updated successfully!');
    }

    public function destroy(Youtube $youtube)
    {
        $youtube->delete();
        return redirect()->route('admin.youtube.index')->with('success', 'Youtube video deleted successfully!');
    }
}




