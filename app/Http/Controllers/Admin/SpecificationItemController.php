<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecificationItem\StoreSpecifcationItemRequest;
use App\Http\Requests\Admin\SpecificationItem\UpdateSpecifcationItemRequest;
use App\Models\Specification;
use App\Models\SpecificationItem;
use App\Services\Admin\SpecificationItem\SpecificationItemService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecificationItemController extends Controller
{
    public SpecificationItemService $service;

    public function __construct(SpecificationItemService $specificationItemService)
    {
        $this->service = $specificationItemService;
    }

    public function index(Specification $specification, Request $request)
    {
        $search = $request->search;

        $data['specification'] = $specification;
        $data['specificationItems'] = SpecificationItem::query()
            ->when($search, function ($query) use ($search) {
                $query->whereHas('titleTranslate', function ($query) use ($search) {
                    $query->where('ru', 'like', "%$search%")
                        ->orWhere('kz', 'like', "%$search%")
                        ->orWhere('en', 'like', "%$search%");
                });
            })
            ->whereSpecificationId($specification->id)
            ->paginate(25);

        return view('admin.specificationItems.index', $data);
    }

    public function create(Specification $specification)
    {
        return view('admin.specificationItems.create', ['specification' => $specification]);
    }

    public function store(StoreSpecifcationItemRequest $request, Specification $specification): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request, $specification) {
                return $this->service->create($request->validated(), $specification);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.specificationItems.index', ['specification' => $specification])
            ->with('success', trans('messages.success_created'));

    }

    public function edit(Specification $specification, SpecificationItem $specificationItem)
    {
        return view('admin.specificationItems.edit', [
            'specification' => $specification,
            'specificationItem' => $specificationItem->load('titleTranslate')
        ]);
    }

    public function update(UpdateSpecifcationItemRequest $request, Specification $specification, SpecificationItem $specificationItem)
    {
        DB::beginTransaction();
        try {
            $this->service->update($specification, $specificationItem, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.specificationItems.index', ['specification' => $specification])
            ->with('success', trans('messages.success_updated'));
    }

    public function destroy(Specification $specification, SpecificationItem $specificationItem)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($specificationItem);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.specificationItems.index', ['specification' => $specification])
            ->with('success', trans('messages.success_deleted'));
    }
}
