<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->scopeBindings()->group(function () {
    Route::view('index', 'admin.index')->name('index');

    Route::resource('cities', \App\Http\Controllers\Admin\CityController::class)->except('show');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class)->except('show');
    Route::resource('applications', \App\Http\Controllers\Admin\ApplicationController::class)->except('create', 'store');
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class)->except('show');
    Route::prefix('articles/{article}')->scopeBindings()->group(function () {
        Route::resource('articleImages', \App\Http\Controllers\Admin\ArticleImageController::class);
    });


    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->except('show');

   Route::resource('specifications', \App\Http\Controllers\Admin\SpecificationController::class)->except('show');
    Route::prefix('specifications/{specification}')->scopeBindings()->group(function () {
        Route::resource('specificationItems', \App\Http\Controllers\Admin\SpecificationItemController::class);
    });

    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class)->except('show');
    Route::resource('careraBanners', \App\Http\Controllers\Admin\CareraBannerController::class)->except('show');
    Route::resource('companySliders', \App\Http\Controllers\Admin\CompanySliderController::class)->except('show');
    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class)->except('show', 'destroy');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class)->except('show', 'destroy');

    Route::resource('agreements', \App\Http\Controllers\Admin\AgreementController::class)->except('show');
    Route::get('agreements/{agreement}/deleteFile', [\App\Http\Controllers\Admin\AgreementController::class, 'deleteFile'])->name('agreements.deleteFile');

    Route::post('summernote/upload-image', [\App\Http\Controllers\Admin\SummernoteController::class, 'uploadImage']);
    Route::post('summernote/delete-image', [\App\Http\Controllers\Admin\SummernoteController::class, 'deleteImage']);

    Route::middleware('role:developer')->group(function () {
        Route::resource('translates', \App\Http\Controllers\Admin\TranslateController::class);
        Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');

        Route::prefix('settings')->name('commands.')->group(function () {
            Route::post('optimize-clear', [\App\Http\Controllers\Admin\SettingController::class, 'optimizeClear'])->name('optimizeClear');
            Route::post('route-cache', [\App\Http\Controllers\Admin\SettingController::class, 'routeCache'])->name('routeCache');
            Route::post('route-clear', [\App\Http\Controllers\Admin\SettingController::class, 'routeClear'])->name('routeClear');
            Route::post('storage-link', [\App\Http\Controllers\Admin\SettingController::class, 'storageLink'])->name('storageLink');
            Route::post('config-clear', [\App\Http\Controllers\Admin\SettingController::class, 'configClear'])->name('configClear');
            Route::post('config-cache', [\App\Http\Controllers\Admin\SettingController::class, 'configCache'])->name('configCache');
            Route::post('cache-clear', [\App\Http\Controllers\Admin\SettingController::class, 'cacheClear'])->name('cacheClear');
        });
    });



    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class)->except('show');
    Route::resource('brandPages', \App\Http\Controllers\Admin\BrandPageController::class)->except('show');
    Route::resource('komeks', \App\Http\Controllers\Admin\KomekController::class)->except('show');
    Route::resource('abouts', \App\Http\Controllers\Admin\AboutController::class)->except('show');
    Route::resource('models', \App\Http\Controllers\Admin\Model\CarModelController::class)->except('show');
    Route::resource('modelSliders', \App\Http\Controllers\Admin\Model\ModelSliderController::class)->except('show');
    Route::resource('types', \App\Http\Controllers\Admin\Model\CarTypeController::class)->except('show');
    Route::resource('colors', \App\Http\Controllers\Admin\Model\ModelColorController::class)->except('show');
    Route::resource('specificationCategories', \App\Http\Controllers\Admin\Model\SpecificationCategoryController::class)->except('show');
    Route::resource('complectations', \App\Http\Controllers\Admin\Model\ModelComplectationController::class)->except('show');
    Route::post('complectations/{complectation}/copy', [\App\Http\Controllers\Admin\Model\ModelComplectationController::class, 'copy'])->name('complectations.copy');
    Route::resource('sections', \App\Http\Controllers\Admin\Model\ModelSectionController::class)->except('show');
    Route::resource('specs', \App\Http\Controllers\Admin\SpecController::class)->except('show');
    Route::resource('sectionItems', \App\Http\Controllers\Admin\Model\ModelSectionItemController::class)->except('show');
    Route::resource('libraries', \App\Http\Controllers\Admin\LibraryController::class)->except('show');
    Route::resource('dealers', \App\Http\Controllers\Admin\DealerController::class)->except('show');
    Route::resource('dealerSeos', \App\Http\Controllers\Admin\DealerSeoController::class)->except('show');
    Route::resource('dealerAddresses', \App\Http\Controllers\Admin\DealerAddressController::class)->except('show');
    Route::resource('worldCategories', \App\Http\Controllers\Admin\WorldCategoryController::class)->except('show');
    Route::resource('worlds', \App\Http\Controllers\Admin\WorldController::class)->except('show');
    Route::resource('rnds', \App\Http\Controllers\Admin\RndController::class)->except('show');
    Route::resource('mainPages', \App\Http\Controllers\Admin\MainPageController::class)->except('show');
    Route::resource('financePages', \App\Http\Controllers\Admin\FinancePageController::class)->except('show');
    //carreers
    Route::resource('carreers', \App\Http\Controllers\Admin\CarreerController::class)->except('show');
    Route::resource('mainPageBanners', \App\Http\Controllers\Admin\MainPageBannerController::class)->except('show');
    //careras
    Route::resource('careras', \App\Http\Controllers\Admin\CareraController::class)->except('show');
    Route::resource('aboutCompanies', \App\Http\Controllers\Admin\AboutCompanyController::class)->except('show');
    Route::get('rnd/', [\App\Http\Controllers\Admin\RndController::class, 'edit'])->name('rnds.edit');
    //achievements
    Route::resource('achievements', \App\Http\Controllers\Admin\AchievementController::class)->except('show');
    //social
    Route::resource('socials', \App\Http\Controllers\Admin\SocialController::class)->except('show');
    //rndAchievements
    Route::resource('rndAchievements', \App\Http\Controllers\Admin\RndAchievementController::class)->except('show', 'index');
    //achievements
    Route::resource('achievements', \App\Http\Controllers\Admin\AchievementController::class)->except('show');
    

    Route::resource('shopItems', \App\Http\Controllers\Admin\ShopItemController::class)->except('show');
    Route::resource('promos', \App\Http\Controllers\Admin\PromoController::class)->except('show');
    //achievementImages
    Route::prefix('achievements/{achievement}')->scopeBindings()->group(function () {
        Route::resource('achievementImages', \App\Http\Controllers\Admin\AchievementImagesController::class)->except('show', 'update', 'edit', 'index');
    });
    //markAsRead
    Route::post('markAsRead', [\App\Http\Controllers\Admin\ApplicationController::class, 'markAsRead'])->name('applications.markAsRead');
    //sendApplication
    Route::post('sendApplication', [\App\Http\Controllers\Admin\ApplicationController::class, 'submit'])->name('applications.sendApplication');
    //banners
    Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class)->except('show');

    Route::group(['middleware' => ['auth','role:admin|admin_finance'], 'prefix' => 'admin'], function () {
        Route::get('/finance/users', [\App\Http\Controllers\Admin\FinanceController::class, 'users'])->name('finance-users.index');
        Route::get('/finance/applications', [\App\Http\Controllers\Admin\FinanceController::class, 'applications'])->name('finance-applications.index');
        Route::resources([
            '/finance-cities' => \App\Http\Controllers\Admin\FinanceCityController::class,
        ]);
    });
});

