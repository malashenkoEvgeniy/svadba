<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Home\Controllers\Site", "prefix" => "/"], function() {
        Route::get('/','HomeController@index')->name('home.index');
        Route::post('/fittingForms','HomeController@fittingForms')->name('fittingForms');
    });

});
