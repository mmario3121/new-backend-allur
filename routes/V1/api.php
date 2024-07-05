<?php

use Illuminate\Support\Facades\Route;

Route::prefix('V1')->group(function () {
   // Модель

   Route::get('/home', [\App\Http\Controllers\Api\V1\MainController::class, 'home']);
   Route::get('/brand/{id}', [\App\Http\Controllers\Api\V1\MainController::class, 'brand']);
   Route::get('/model/{slug}', [\App\Http\Controllers\Api\V1\CarModelController::class, 'getBySlug']);


   Route::get('/header', [\App\Http\Controllers\Api\V1\CarModelController::class, 'getTypes']);

   //komek

   Route::get('/finance', [\App\Http\Controllers\Api\V1\MainController::class, 'finance']);
   Route::get('/news', [\App\Http\Controllers\Api\V1\NewsController::class, 'getAll']);
   Route::get('/article/{slug}', [\App\Http\Controllers\Api\V1\NewsController::class, 'getBySlug']);
   Route::get('/about', [\App\Http\Controllers\Api\V1\MainController::class, 'about']);
   Route::get('/production', [\App\Http\Controllers\Api\V1\MainController::class, 'production']);
   Route::get('/socials', [\App\Http\Controllers\Api\V1\MainController::class, 'socials']);
   Route::get('/career', [\App\Http\Controllers\Api\V1\MainController::class, 'career']);

   Route::post('/register', [\App\Http\Controllers\Api\V1\CustomerController::class, 'register']);
   Route::post('/login', [\App\Http\Controllers\Api\V1\CustomerController::class, 'login']);
   Route::get('/me', [\App\Http\Controllers\Api\V1\CustomerController::class, 'me']);

   //shop
   Route::get('/shop', [\App\Http\Controllers\Api\V1\ShopController::class, 'index']);

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

   Route::get('/filter-models', [\App\Http\Controllers\Api\V1\MainController::class, 'filterModels']);

   //getbrands
   Route::get('/brands', [\App\Http\Controllers\Api\V1\MainController::class, 'brands']);
});
