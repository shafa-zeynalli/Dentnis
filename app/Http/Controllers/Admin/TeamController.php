<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Team;
use App\Models\TeamTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index($lang)
    {
//        dd($lang);
        $teams = Team::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();


        return view('Admin.pages.team.index', compact('teams'));
    }


    public function create()
    {
        return view('Admin.pages.team.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
            'firstName' => 'required',
        ]);
        $team = new Team();
        $team->image = $request->file('image')->store('team_images', 'public');
        $team->title = $request->input('firstName');
        $team->save();

        foreach (config('app.languages') as $lang) {

            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;
            TeamTranslation::create([
                'teams_id' => $team->id,
                'language_id' => $langId,
                'position' => $request->input("$lang.title"),
            ]);
        }
//        $request->request->replace([]);
        return redirect()->route('admin.teams.index', ['lang' => 'en'])->with('success', 'Team member created successfully');
    }

    public function edit(Team $team)
    {
//        $teamPosition= Team::with('translations')->first();
//        dd($teamPosition);
        return view('Admin.pages.team.edit', compact('team'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
        ]);

        // Eğer güncelleme yapılıyorsa, önce ilgili kaydı bul
        $team = Team::find($request->input('team_id'));

        // Eğer yeni kayıt ise dosyayı kaydet
        if ($request->hasFile('image')) {
            $team->image = $request->file('image')->store('team_images', 'public');
        }

        $team->title = $request->input('firstName');
        $team->save();

        foreach (config('app.languages') as $lang) {
            $language = Language::where('lang', $lang)->first();
            $langId = $language->id;

            // Eğer dil çevirisi zaten varsa, güncelle; yoksa oluştur
            $teamTranslation = TeamTranslation::updateOrCreate(
                ['teams_id' => $team->id, 'language_id' => $langId],
                ['position' => $request->input("$lang.title")]
            );
        }

        return redirect()->route('admin.teams.index', ['lang' => 'en'])->with('success', 'Team member created or updated successfully');
    }


    public function delete(Team $team)
    {
//        dd( $team->translations()->get());
        if ($team) {
            // İlgili çevirileri sil
            $team->translations()->delete();
//          Takım resmini storage'dan sil
            if (Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }
            // Takımı sil
            $team->delete();

            return redirect()->back()->with('success', 'Team deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Team not found.');
        }

    }
}
