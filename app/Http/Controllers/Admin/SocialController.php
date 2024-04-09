<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Social\StoreSocialRequest;
use App\Http\Requests\Admin\Social\UpdateSocialRequest;
use App\Models\Social;
use App\Services\Admin\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public SocialService $service;

    public function __construct(SocialService $socialService)
    {
        $this->service = $socialService;
    }

    public function index(Request $request)
    {
        $data['socials'] = Social::all();
        return view('admin.socials.index', $data);
    }

    public function create()
    {
        return view('admin.socials.create');
    }

    public function store(StoreSocialRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->create($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.socials.index')->with('success', trans('messages.success_created'));
    }

    public function edit(Social $social)
    {
        return view('admin.socials.edit', ['social' => $social]);
    }

    public function update(UpdateSocialRequest $request, Social $social)
    {
        DB::beginTransaction();
        try {
            $this->service->update($social, $request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.socials.index')->with('success', trans('messages.success_updated'));
    }

    public function destroy(Social $social)
    {
        try {
            DB::transaction(function () use ($social) {
                return $this->service->delete($social);
            });
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return redirect()->route('admin.socials.index')->with('success', trans('messages.success_deleted'));
    }
}
