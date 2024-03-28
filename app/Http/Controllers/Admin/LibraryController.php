<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Library\StoreLibraryRequest;
use App\Http\Requests\Admin\Library\UpdateLibraryRequest;
use App\Models\Library;
use App\Models\CarModel;
use App\Services\Admin\LibraryService;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public LibraryService $service;

    public function __construct(LibraryService $aboutBannerService)
    {
        $this->service = $aboutBannerService;
    }

    public function index()
    {
        $data['libraries'] = Library::all();
        return view('admin.libraries.index', $data);
    }

    public function create()
    {
        $data['models'] = CarModel::all();
        return view('admin.libraries.create', $data);
    }

    public function store(StoreLibraryRequest $request)
    {
        try {
            $data['library'] = DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.libraries.edit', $data)
        ->with('success', trans('messages.success_created'));
    }

    public function edit(Library $library)
    {
        $data['models'] = CarModel::all();
        $data['library'] = $library;
        return view('admin.libraries.edit', $data);
    }

    public function update(UpdateLibraryRequest $request, Library $library)
    {
        try {
            DB::transaction(function () use ($request, $library) {
               return $this->service->update($library,$request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
    //write the destroy function
    public function destroy(Library $library){
        try{
            $library->delete();
        }catch(\Exception $exception){
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return back()->with('success', trans('messages.success_updated'));
    }
}