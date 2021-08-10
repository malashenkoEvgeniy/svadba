<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Home\Controllers\Site", "prefix" => "/"], function() {
        Route::get('/','HomeController@index')->name('home.index');
    });

});
