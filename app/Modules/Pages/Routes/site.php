<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Pages\Controllers\Site", "prefix" => "/"], function() {
        Route::get('sort-prom', 'PageController@promSort')->name('promotion-sort');
        Route::get('/{slug}','PageController@view')->name('page.view');
        Route::get('select-color/{id}','PageController@selectColor')->name('page.select-color');
        Route::get('category/{slug}','CategoryController@view')->name('page.category.view');
        Route::get('sort/{slug}', 'CategoryController@viewSort')->name('view-sort');
        Route::get('filter/{slug}', 'CategoryController@viewFilter')->name('view-filter');
    });

});
