<?php

use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\SilhouetteController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


require __DIR__.'/auth.php';
Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Log::debug('CLEARED');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth'],
    ], function () {
    Route::group(['prefix' => 'admin-my'], function () {
        Route::get('', [HomeController::class, 'index'])->name('my-home');
        Route::resource('home', HomeController::class)->except([
            'index'
        ]);
        Route::resource('categories', CategoryController::class);
        Route::resource('brands', BrandsController::class);
        Route::resource('colors', ColorsController::class);
        Route::resource('products', ProductController::class);
        Route::resource('pages', PageController::class);
        Route::resource('shops', ShopController::class);
        Route::resource('cities', CityController::class);
        Route::resource('silhouettes', SilhouetteController::class);

    }
    );
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(["namespace"=>"App\Http\Controllers\Site", "prefix" => "/"], function() {
        Route::get('catalog','CategoryController@index')->name('catalog.index');
    });

});
