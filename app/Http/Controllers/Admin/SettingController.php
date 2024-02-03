<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\TvProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Setting $setting)
    {
        return view('Admin.pages.setting.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'address' => 'required',
            'mail' => 'required|email',
            'phone' => 'required',
        ]);
//dd($request->all());
        if ($request->hasFile('top_image')) {
            if (Storage::disk('public')->exists($setting->top_logo)) {
                Storage::disk('public')->delete($setting->top_logo);

            }
//            dd($setting->top_logo);
            $setting->top_logo = $request->file('top_image')->store('logo_images', 'public');
        }
        if ($request->hasFile('bottom_image')) {
            if (Storage::disk('public')->exists($setting->bottom_logo)) {
                Storage::disk('public')->delete($setting->bottom_logo);

            }
            $setting->bottom_logo = $request->file('bottom_image')->store('logo_images', 'public');
        }
        $setting->address = $request->input('address');
        $setting->mail = $request->input('mail');
        $setting->phone = $request->input('phone');
        $setting->save();

        return redirect()->route('admin.setting.index')->with('success', 'Setting updated successfully.');
    }


    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()->route('admin.setting.index')->with('success', 'Setting deleted successfully.');
    }
}
