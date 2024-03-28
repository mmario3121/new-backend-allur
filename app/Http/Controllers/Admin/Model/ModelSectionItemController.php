<?php

namespace App\Http\Controllers\Admin\Model;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelSectionItem\StoreModelSectionItemRequest;
use App\Http\Requests\Admin\ModelSectionItem\UpdateModelSectionItemRequest;
use App\Models\ModelSectionItem;
use App\Models\ModelSection;
use App\Models\CarModel;
use App\Services\Admin\Model\ModelSectionItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ModelSectionItemController extends Controller
{
    public ModelSectionItemService $service;

    public function __construct(ModelSectionItemService $modelService)
    {
        $this->service = $modelService;
    }

    public function index(Request $request)
    {
        $data['sectionItems'] = ModelSectionItem::where('section_id', $request->section_id)->get();
        $data['section'] = ModelSection::find($request->section_id);
        // dd($data['model']);
        return view('admin.sectionItems.index', $data);
    }

    public function create(Request $request)
    {
        $data['section'] = ModelSection::find($request->section_id);
        return view('admin.sectionItems.create', $data);
    }

    public function store(StoreModelSectionItemRequest $request)
    {
        try {
            $data['sectionItem'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.sectionItems.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(ModelSectionItem $sectionItem): View
    {
        $data['sectionItem'] = $sectionItem;
        $data['section'] = ModelSection::find($sectionItem->section_id);
        return view('admin.sectionItems.edit', $data);
    }

    public function update(UpdateModelSectionItemRequest $request, ModelSectionItem $sectionItem)
    {
        try {
            DB::transaction(function () use ($request, $sectionItem) {
               return $this->service->update($sectionItem, $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.sectionItems.edit', $sectionItem)
        ->with('success', trans('messages.success_created'));
    }

    public function destroy(ModelSectionItem $sectionItem)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($sectionItem);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return back()->with('success', trans('messages.success_deleted'));
    }

}
