<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelSection\StoreModelSectionRequest;
use App\Http\Requests\Admin\ModelSection\UpdateModelSectionRequest;
use App\Models\ModelSection;
use App\Models\ModelSectionItem;
use App\Models\CarModel;
use App\Services\Admin\Model\ModelSectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ModelSectionController extends Controller
{
    public ModelSectionService $service;

    public function __construct(ModelSectionService $modelService)
    {
        $this->service = $modelService;
    }

    public function index(Request $request)
    {
        $data['sections'] = ModelSection::where('model_id', $request->model_id)->get();
        $data['model'] = CarModel::find($request->model_id);
        // dd($data['model']);
        return view('admin.sections.index', $data);
    }

    public function create(Request $request)
    {
        $data['model'] = CarModel::find($request->model_id);
        return view('admin.sections.create', $data);
    }

    public function store(StoreModelSectionRequest $request)
    {
        try {
            $data['section'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.sections.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(ModelSection $section): View
    {
        $data['section'] = $section;
        $data['sectionItems'] = ModelSectionItem::where('section_id', $section->id)->get();
        $data['model'] = CarModel::find($section->model_id);
        // dd($data);
        return view('admin.sections.edit', $data);
    }

    public function update(UpdateModelSectionRequest $request, ModelSection $section)
    {
        try {
            DB::transaction(function () use ($request, $section) {
               return $this->service->update($section, $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.sections.edit', $section)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(ModelSection $section)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($section);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return back()->with('success', trans('messages.success_deleted'));
    }

}
