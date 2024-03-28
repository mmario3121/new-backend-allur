<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorldCategory\StoreWorldCategoryRequest;
use App\Http\Requests\Admin\WorldCategory\UpdateWorldCategoryRequest;
use App\Models\WorldCategory;
use App\Services\Admin\WorldCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorldCategoryController extends Controller
{
    public WorldCategoryService $service;

    public function __construct(WorldCategoryService $worldCategoryService)
    {
        $this->service = $worldCategoryService;
    }

    public function index(Request $request)
    {
        $data['worldCategories'] = WorldCategory::all();
        return view('admin.worldCategories.index', $data);
    }

    public function create()
    {
        return view('admin.worldCategories.create');
    }

    public function store(StoreWorldCategoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.worldCategories.index')->with('success', trans('messages.success_created'));
    }

    public function edit(WorldCategory $worldCategory)
    {
        return view('admin.worldCategories.edit', ['worldCategory' => $worldCategory]);
    }

    public function update(UpdateWorldCategoryRequest $request, WorldCategory $worldCategory)
    {
        DB::beginTransaction();
        try {
            $this->service->update($worldCategory, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.worldCategories.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(WorldCategory $worldCategory)
    {
        try {
            DB::transaction(function () use ($worldCategory) {
                return $this->service->delete($worldCategory);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.worldCategories.index')->with('success', trans('messages.success_deleted'));
    }
}
