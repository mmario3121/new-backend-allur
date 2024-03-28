<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\VacancyApplication;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

//        view()->composer('admin._components.sidebar', function ($view) {
//            $vacancyApplicationCount = VacancyApplication::query()
//                ->where('status', '=', 0)
//                ->count();
//
//            $applicationCount = Application::query()
//                ->where('status', '=', 0)
//                ->count();
//
//            $view->with([
//                'vacancyApplicationCount' => $vacancyApplicationCount,
//                'applicationCount' => $applicationCount
//            ]);
//        });
    }
}
