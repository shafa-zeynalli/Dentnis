<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\TvProgram;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::all();

        return view('Admin.pages.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('Admin.pages.setting.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'top_image' => 'required',
            'bottom_image' => 'required',
            'address' => 'required',
            'mail' => 'required|email',
            'phone' => 'required',
        ]);
//        dd($request->all());
        $setting = new Setting();
        $setting->top_logo = $request->file('top_image')->store('logo_images', 'public');
        $setting->bottom_logo = $request->file('bottom_image')->store('logo_images', 'public');
        $setting->address = $request->input('address');
        $setting->mail = $request->input('mail');
        $setting->phone = $request->input('phone');
        $setting->save();

        return redirect()->route('admin.setting.index')->with('success', 'Setting Item added successfully.');
    }

    public function edit(TvProgram $tv_program)
    {
        return view('Admin.pages.tvprograms.edit', compact('tv_program'));
    }

    public function update(Request $request, TvProgram $tv_program)
    {
        $request->validate([
            'url' => 'url',
        ]);

        $tv_program->update($request->all());

        return redirect()->route('admin.program.index')->with('success', 'YouTube video updated successfully.');
    }


    public function destroy(TvProgram $tv_program)
    {
        $tv_program->delete();

        return redirect()->route('admin.program.index')->with('success', 'YouTube video deleted successfully.');
    }
}
