<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Agreement\DeleteAgreementFileRequest;
use App\Http\Requests\Admin\Agreement\StoreAgreementRequest;
use App\Http\Requests\Admin\Agreement\UpdateAgreementRequest;
use App\Models\Agreement;
use App\Services\Admin\Agreement\AgreementService;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    public AgreementService $service;

    public function __construct(AgreementService $agreementService)
    {
        $this->service = $agreementService;
    }

    public function index()
    {
        $data['agreements'] = Agreement::query()
                ->with('fileTranslate')
                ->get();

        return view('admin.agreements.index', $data);
    }

    public function create()
    {
        $data['types'] = Agreement::TYPES;
        return view('admin.agreements.create', $data);
    }

    public function store(StoreAgreementRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.agreements.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Agreement $agreement)
    {
        $data['types'] = Agreement::TYPES;
        $data['agreement'] = $agreement->load('fileTranslate');
        return view('admin.agreements.edit', $data);
    }

    public function update(UpdateAgreementRequest $request, Agreement $agreement)
    {
        try {
            DB::transaction(function () use ($request, $agreement) {
                return $this->service->update($agreement->load('fileTranslate'), $request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.agreements.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Agreement $agreement)
    {
        try {
            DB::transaction(function () use ($agreement) {
                return $this->service->delete($agreement->load('fileTranslate'));
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.agreements.index')->with('success', trans('messages.success_deleted'));
    }

    public function deleteFile(Agreement $agreement, DeleteAgreementFileRequest $request)
    {
        try {
            $this->service->deleteFile($agreement->load('fileTranslate'), $request->validated()['language']);
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

        return back()->with('success', trans('messages.success_deleted'));
    }
}
