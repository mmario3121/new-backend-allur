<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\AchievementImage;
use App\Http\Controllers\Controller;

class AchievementImagesController extends Controller
{
    public function create(Achievement $achievement){
        return view('admin.achievement-images.create', compact('achievement'));
    }

    public function store(Request $request, Achievement $achievement){
        $this->validate($request, [
            'image' => 'required|image',
        ]);

        $achievementImage = AchievementImage::create([
            'achievement_id' => $achievement->id,
            'image' => $request->image,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $achievementImage->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/images/achievement-images');
            $image->move($destinationPath, $name);
            $achievementImage->image = $name;
            $achievementImage->save();
        }
        return redirect('/admin/achievements/' . $achievement->id . '/edit')->with('success', 'Achievement updated!');
    }

    public function destroy($achievement, $achievementImage){
        $achievementImage = AchievementImage::findorfail($achievementImage);
        $achievementImage->delete();
        return redirect('admin/achievements/' . $achievementImage->achievement_id . '/edit')->with('success', 'Achievement updated!');
    }
}
