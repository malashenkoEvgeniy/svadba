<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', [HomeController::class, 'index']);
//Auth::routes();
//Route::get('/', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('admin');

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

    }
    );
});
//Route::group(['prefix' => 'admin'], function(){
//
//    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index']);
//
//
//});
