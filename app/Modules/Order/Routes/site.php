<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Order\Controllers\Site"], function() {

        Route::get('/order','CartController@index')->name('order.index');
    });

});
