<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Pages\Controllers\Site", "prefix" => "/"], function() {
        Route::get('/{slug}','PageController@view')->name('page.view');
    });

});
