<?php

namespace App\Http\Controllers\Admin;

use App\Models\RndAchievement;
use Illuminate\Http\Request;
use App\Models\Rnd;
use App\Http\Controllers\Controller;

class RndAchievementController extends Controller
{
    //edit, create, update, destroy, store. There is only one rnd

    public function edit(RndAchievement $rndAchievement)
    {
        return view('admin.rndAchievements.edit', compact('rndAchievement'));
    }

    public function create()
    {
        return view('admin.rndAchievements.create');
    }

    public function update(Request $request, RndAchievement $rndAchievement)
    {
        $request->validate([
            'text' => 'required',
            'text_kz' => 'required',
            'image' => 'nullable|image',
        ]);

        $rndAchievement->text = $request->get('text');
        $rndAchievement->text_kz = $request->get('text_kz');

        if ($request->hasFile('image')) {
            $rndAchievement->image = $request->file('image')->store(RndAchievement::IMAGE_PATH, 'custom');
        }

        $rndAchievement->save();

        return redirect('/admin/rnd')->with('success', 'Rnd updated!');
    }

    public function destroy(RndAchievement $rndAchievement)
    {
        $rndAchievement->delete();
        return redirect('/admin/rnd')->with('success', 'Rnd deleted!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'text_kz' => 'required',
            'image' => 'required|image',
        ]);

        $rndAchievement = new RndAchievement([
            'text' => $request->get('text'),
            'text_kz' => $request->get('text_kz'),
            'image' => $request->file('image')->store(RndAchievement::IMAGE_PATH, 'custom'),
        ]);
        $rndAchievement->save();
        //redirect to edit rnd
        return redirect('/admin/rnd')->with('success', 'Rnd saved!');
    }


}
