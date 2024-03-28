<?php

use Illuminate\Support\Facades\Route;

Route::prefix('V1')->group(function () {
   // Модель

   Route::get('/model/get', [\App\Http\Controllers\Api\V1\CarModelController::class, 'getBySlug']);
   Route::get('/home', [\App\Http\Controllers\Api\V1\MainController::class, 'home']);
   Route::get('/header', [\App\Http\Controllers\Api\V1\CarModelController::class, 'getTypes']);
   Route::get('/news', [\App\Http\Controllers\Api\V1\NewsController::class, 'getAll']);
   Route::get('/article', [\App\Http\Controllers\Api\V1\NewsController::class, 'getBySlug']);
   Route::get('/libraries', [\App\Http\Controllers\Api\V1\MainController::class, 'libraries']);
   Route::get('/dealer-seo', [\App\Http\Controllers\Api\V1\MainController::class, 'dealerSeos']);
   //dealer-addresses
   Route::get('/dealer-addresses', [\App\Http\Controllers\Api\V1\MainController::class, 'dealerAddresses']);

   //worldCategories
   Route::get('/world/categories', [\App\Http\Controllers\Api\V1\WorldController::class, 'worldCategories']);

   //world/history
   Route::get('/world/history', [\App\Http\Controllers\Api\V1\WorldController::class, 'history']);
   //world/brand
   Route::get('/world/brand', [\App\Http\Controllers\Api\V1\WorldController::class, 'brand']);
   //world/rnd
   Route::get('/world/rnd', [\App\Http\Controllers\Api\V1\WorldController::class, 'rnd']);
   //world/achievements
   Route::get('/world/achievements', [\App\Http\Controllers\Api\V1\WorldController::class, 'achievements']);

   //application post
   Route::post('/send-application', [\App\Http\Controllers\Api\V1\ApplicationController::class, 'store']);

   //dealers
   Route::get('/dealers', [\App\Http\Controllers\Api\V1\MainController::class, 'dealers']);

   //cities

   Route::get('/cities', [\App\Http\Controllers\Api\V1\MainController::class, 'cities']);
   //models
   Route::get('/models', [\App\Http\Controllers\Api\V1\MainController::class, 'models']);
   //banner
   Route::get('/banners', [\App\Http\Controllers\Api\V1\MainController::class, 'banners']);
});
