<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Achievement;

class AchievementController extends Controller
{
    //index

    public function index()
    {
        $achievements = Achievement::all();
        return view('admin.achievements.index', compact('achievements'));
    }

    //create

    public function create()
    {
        return view('admin.achievements.create');
    }

    //store

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'title_kz' => 'nullable',
            'description' => 'required',
            'description_kz' => 'required',
            'description2' => 'nullable',
            'description2_kz' => 'nullable',
        ]);

        $achievement = new Achievement([
            'title' => $request->get('title'),
            'title_kz' => $request->get('title_kz'),
            'description' => $request->get('description'),
            'description_kz' => $request->get('description_kz'),
            'description2' => $request->get('description2'),
            'description2_kz' => $request->get('description2_kz'),
        ]);
        $achievement->save();
        //redirect to edit achievement
        return redirect('admin/achievements/'.$achievement->id.'/edit')->with('success', 'Achievement saved!');
    }

    //edit

    public function edit(Achievement $achievement)
    {
        $achievementImages = $achievement->achievementImages;
        return view('admin.achievements.edit', compact('achievement', 'achievementImages'));
    }

    //update

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'nullable',
            'title_kz' => 'nullable',
            'description' => 'required',
            'description_kz' => 'required',
            'description2' => 'nullable',
            'description2_kz' => 'nullable',
        ]);

        $achievement->title = $request->get('title');
        $achievement->title_kz = $request->get('title_kz');
        $achievement->description = $request->get('description');
        $achievement->description_kz = $request->get('description_kz');
        $achievement->description2 = $request->get('description2');
        $achievement->description2_kz = $request->get('description2_kz');
        
        $achievement->save();

        return redirect('/admin/achievements')->with('success', 'Achievement updated!');
    }
}
