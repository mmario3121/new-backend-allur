<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\World;
use App\Models\WorldCategory;

class WorldController extends Controller
{

    public function index(Request $request)
    {
        // dd($request->all());
        $worldCategory = WorldCategory::findorfail($request->worldCategory_id);
        $worlds = World::where('worldcategory_id', $worldCategory->id)->get();
        return view('admin.worlds.index', compact('worlds', 'worldCategory'));
    }

    public function create(Request $request)
    {
        $worldCategory = WorldCategory::findorfail($request->worldCategory);
        return view('admin.worlds.create', compact('worldCategory'));
    }

    public function store(Request $request)
    {
        //year is requred if WorldCategory is history
        if ($request->worldcategory_id == 1) {
            $request->validate([
                'worldcategory_id' => 'required',
                'title' => 'required',
                'title_kz' => 'required',
                'year' => 'required',
                'description' => 'required',
                'description_kz' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
        }else{
            $request->validate([
                'worldcategory_id' => 'required',
                'title' => 'required',
                'title_kz' => 'required',
                'description' => 'required',
                'description_kz' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
        }

        $world = World::create([
            'worldcategory_id' => $request->worldcategory_id,
            'title' => $request->title,
            'title_kz' => $request->title_kz,
            'year' => $request->year,
            'description' => $request->description,
            'description_kz' => $request->description_kz,
            'image' => $request->image,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $world->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/images/worlds');
            $image->move($destinationPath, $name);
            $world->image = $name;
            $world->save();
        }

        return redirect()->route('admin.worlds.index', ['worldCategory_id' => $request->worldcategory_id])->with('success', 'Успешно Создано.');
    }

    public function show(World $world)
    {
        return view('admin.worlds.show', compact('world'));
    }

    public function edit(World $world)
    {
        $worldcategories = Worldcategory::all();
        $worldCategory = WorldCategory::findorfail($world->worldcategory_id);
        return view('admin.worlds.edit', compact('world', 'worldcategories', 'worldCategory'));
    }

    public function update(Request $request, World $world)
    {
        $request->validate([
            'title' => 'required',
            'title_kz' => 'required',
            'year' => 'nullable',
            'description' => 'required',
            'description_kz' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $world->update([
            'title' => $request->title,
            'title_kz' => $request->title_kz,
            'year' => $request->year,
            'description' => $request->description,
            'description_kz' => $request->description_kz,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $world->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/images/worlds');
            $image->move($destinationPath, $name);
            $world->image = $name;
            $world->save();
        }

        return redirect()->route('admin.worlds.index', ['worldCategory_id' => $world->worldcategory_id])->with('success', 'Успешно Обновлено.');
    }

    public function destroy(World $world)
    {
        $world->delete();
        return redirect()->route('admin.worlds.index', ['worldCategory_id' => $world->worldcategory_id])->with('success', 'Успешно Удалено.');
    }
}
