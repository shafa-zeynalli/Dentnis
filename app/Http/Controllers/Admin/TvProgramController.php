<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TvProgram;
use Illuminate\Http\Request;

class TvProgramController extends Controller
{

    public function index()
    {
        $shows = TvProgram::all();

        return view('Admin.pages.tvprograms.index', compact('shows'));
    }

    public function create()
    {
        return view('Admin.pages.tvprograms.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'title' => 'required'
        ]);
//        dd($request->all());
        $program = new TvProgram();
        $program->url = $request->input('url');
        $program->title = $request->input('title');
        $program->save();

        return redirect()->route('admin.program.index')->with('success', 'YouTube video added successfully.');
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
