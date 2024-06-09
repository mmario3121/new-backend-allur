<?php

use Illuminate\Support\Facades\Route;

Route::prefix('V1')->group(function () {
   // Модель

   Route::get('/home', [\App\Http\Controllers\Api\V1\MainController::class, 'home']);
   Route::get('/header', [\App\Http\Controllers\Api\V1\CarModelController::class, 'getTypes']);

   Route::get('/model/get', [\App\Http\Controllers\Api\V1\CarModelController::class, 'getBySlug']);
   Route::get('/news', [\App\Http\Controllers\Api\V1\NewsController::class, 'getAll']);
   Route::get('/article', [\App\Http\Controllers\Api\V1\NewsController::class, 'getBySlug']);
   Route::get('/dealer-seo', [\App\Http\Controllers\Api\V1\MainController::class, 'dealerSeos']);
   //dealer-addresses
   Route::get('/dealer-addresses', [\App\Http\Controllers\Api\V1\MainController::class, 'dealerAddresses']);

   //application post
   Route::post('/send-application', [\App\Http\Controllers\Api\V1\ApplicationController::class, 'store']);

   //dealers
   Route::get('/dealers', [\App\Http\Controllers\Api\V1\MainController::class, 'dealers']);

   //cities

   Route::get('/cities', [\App\Http\Controllers\Api\V1\MainController::class, 'cities']);
   //models
   Route::get('/models', [\App\Http\Controllers\Api\V1\MainController::class, 'models']);
});
