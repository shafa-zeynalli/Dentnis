<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorImage;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorImageController extends Controller
{
    public function index()
    {
        $images = DoctorImage::all();
        return view('Admin.pages.doctor images.index', compact('images'));
    }

    public function create()
    {
        return view('Admin.pages.slider.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        Slider::create([
            'image' => $request->file('image')->store('slider_images', 'public'),
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider image added successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('Admin.pages.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
//        dd($request->all());
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);

            }
            $slider->update([
                'image' => $request->file('image')->store('slider_images', 'public'),
            ]);
        }



        return redirect()->route('admin.slider.index')->with('success', 'Slider image updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        if (Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);

        }
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider image deleted successfully!');
    }
}




