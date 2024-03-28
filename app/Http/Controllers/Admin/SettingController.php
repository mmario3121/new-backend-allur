<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function optimizeClear()
    {
        try {
            Artisan::call('optimize:clear');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return back()->with('success', 'Optimize clear сілтемесі іске асырылды!');
    }

    public function routeCache()
    {
        try {
            Artisan::call('route:cache');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return back()->with('success', 'Route cache сілтемесі іске қосылды!');
    }

    public function routeClear()
    {
        try {
            Artisan::call('route:clear');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return back()->with('success', 'Route clear сілтемесі іске қосылды!');
    }

    public function storageLink()
    {
        try {
            Artisan::call('storage:link');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return back()->with('success', 'Storage link сілтемесі іске қосылды!');
    }

    public function configClear()
    {
        try {
            Artisan::call('config:clear');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return back()->with('success', 'Config clear сілтемесі іске қосылды!');
    }

    public function configCache()
    {
        try {
            Artisan::call('config:cache');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return back()->with('success', 'Config cache сілтемесі іске қосылды!');
    }

    public function cacheClear()
    {
        try {
            Artisan::call('cache:clear');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        return back()->with('success', 'Cache clear сілтемесі іске қосылды!');
    }
}
