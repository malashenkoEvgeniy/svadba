<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Pages\Controllers\Site", "prefix" => "/"], function() {
        Route::get('/{slug}','PageController@view')->name('page.view');
        Route::get('category/{slug}','CategoryController@view')->name('page.category.view');
    });

});
