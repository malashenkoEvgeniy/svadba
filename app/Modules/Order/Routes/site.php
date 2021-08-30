<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Order\Controllers\Site"], function() {

        Route::get('/order','OrderController@index')->name('order.index');
    });

});
