<?php

namespace App\Http\Controllers\Admin;

use App\Models\RndAchievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rnd; 

class RndController extends Controller
{
    //index all Rnd

    public function index()
    {
        $rnds = Rnd::all();
        return view('admin.rnds.index', compact('rnds'));
    }

    //create Rnd

    public function create()
    {
        return view('admin.rnds.create');
    }

    //store Rnd

    public function store(Request $request)
    {
        $request->validate([
            'section1' => 'nullable',
            'section2' => 'nullable',
            'section3_image' => 'required',
            'section3_banner' => 'required',
            'section3_text' => 'required',
        ]);

        //saving images
        $section3_image = $request->file('section3_image')->store('images/rnds', 'custom');
        $section3_banner = $request->file('section3_banner')->store('images/rnds', 'custom');

        $rnd = new Rnd([
            'section1' => $request->get('section1'),
            'section2' => $request->get('section2'),
            'section3_image' => $section3_image,
            'section3_banner' => $section3_banner,
            'section3_text' => $request->get('section3_text'),
        ]);
        $rnd->save();
        //redirect to edit rnd
        return redirect('/rnds/'.$rnd->id.'/edit')->with('success', 'Rnd saved!');
    }

    //edit Rnd

    public function edit()
    {
        $rnd = Rnd::find(1);
        $rndAchievements = RndAchievement::all();
        return view('admin.rnds.edit', compact('rnd', 'rndAchievements'));
    }

    //update Rnd

    public function update(Request $request, $id)
    {
        $request->validate([
            'section1' => 'nullable',
            'section2' => 'nullable',
            'section3_image' => 'required',
            'section3_banner' => 'required',
            'section3_text' => 'required',
        ]);
        //saving images

        $section3_image = $request->file('section3_image')->store('images/rnds', 'custom');
        $section3_banner = $request->file('section3_banner')->store('images/rnds', 'custom');

        $rnd = Rnd::find($id);
        $rnd->section1 = $request->get('section1');
        $rnd->section2 = $request->get('section2');
        $rnd->section3_image = $section3_image;
        $rnd->section3_banner = $section3_banner;
        $rnd->section3_text = $request->get('section3_text');
        $rnd->save();
        //redirect back with success
        return redirect()->back()->with('success', 'Rnd updated!');
    }

    //destroy Rnd

    public function destroy($id)
    {
        $rnd = Rnd::find($id);
        $rnd->delete();
        return redirect('/rnds')->with('success', 'Rnd deleted!');
    }
}
