<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sponsor = Sponsor::all();
        return view('Admin.pages.sponsor.index', compact('sponsor'));
    }

    public function create()
    {
        return view('Admin.pages.sponsor.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Sponsor::create([
            'image' => $request->file('image')->store('sponsor_images', 'public'),
        ]);

        return redirect()->route('admin.sponsor.index')->with('success', 'Sponsor image added successfully!');
    }

    public function edit(Sponsor $sponsor)
    {
        return view('Admin.pages.sponsor.edit', compact('sponsor'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
//        dd($request->all());
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($sponsor->image)) {
                Storage::disk('public')->delete($sponsor->image);
            }
            $sponsor->update([
                'image' => $request->file('image')->store('sponsor_images', 'public'),
            ]);
        }

        return redirect()->route('admin.sponsor.index')->with('success', 'Sponsor image updated successfully!');
    }

    public function destroy(Sponsor $sponsor)
    {
        if (Storage::disk('public')->exists($sponsor->image)) {
            Storage::disk('public')->delete($sponsor->image);

        }
        $sponsor->delete();
        return redirect()->route('admin.sponsor.index')->with('success', 'Sponsor image deleted successfully!');
    }
}




