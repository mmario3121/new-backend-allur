<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\StoreAboutRequest;
use App\Http\Requests\Admin\About\UpdateAboutRequest;
use App\Models\About;
use App\Services\Admin\AboutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public AboutService $service;

    public function __construct(AboutService $aboutService)
    {
        $this->service = $aboutService;
    }

    public function index(Request $request)
    {
        $data['abouts'] = About::all();
        return view('admin.abouts.index', $data);
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(StoreAboutRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.abouts.index')->with('success', trans('messages.success_created'));
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit', ['about' => $about]);
    }

    public function update(UpdateAboutRequest $request, About $about)
    {
        DB::beginTransaction();
        try {
            $this->service->update($about, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.abouts.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(About $about)
    {
        try {
            DB::transaction(function () use ($about) {
                return $this->service->delete($about);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.abouts.index')->with('success', trans('messages.success_deleted'));
    }
}
