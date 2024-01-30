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
        return view('Admin.pages.doctor images.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        DoctorImage::create([
            'image' => $request->file('image')->store('doctor_images', 'public'),
        ]);

        return redirect()->route('admin.d_image.index')->with('success', 'Doctor image added successfully!');
    }

    public function edit(DoctorImage $image)
    {
//        dd($image);
        return view('Admin.pages.doctor images.edit', compact('image'));
    }

    public function update(Request $request, DoctorImage $image)
    {
//        dd($request->all());
        $request->validate([
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
//                dd($image);
            if (!is_null($image->image) && is_string($image->image)) {
                if (Storage::disk('public')->exists($image->image)) {
                    Storage::disk('public')->delete($image->image);
                }
            }
            $image->update([
                'image' => $request->file('image')->store('doctor_images', 'public'),
            ]);
        }


        return redirect()->route('admin.d_image.index')->with('success', 'Doctor image updated successfully!');
    }

    public function destroy(DoctorImage $image)
    {
        if (Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);

        }
        $image->delete();
        return redirect()->route('admin.d_image.index')->with('success', 'Doctor image deleted successfully!');
    }
}




