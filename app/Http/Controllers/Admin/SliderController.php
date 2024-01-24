<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('Admin.pages.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('Admin.pages.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|url',
        ]);

        Slider::create([
            'image' => $request->input('image'),
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider image added successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('Admin.pages.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'required|url',
        ]);

        $slider->update([
            'image' => $request->input('image'),
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider image updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider image deleted successfully!');
    }
}




