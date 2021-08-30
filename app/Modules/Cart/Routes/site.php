<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web' ]
    ], function(){

    Route::group(["namespace"=>"App\Modules\Cart\Controllers\Site"], function() {

        Route::get('/cart','CartController@index')->name('cart.index');
        Route::post('/add-to-cart','CartController@addToCart')->name('cart.add-to-cart');
        Route::get('/show-to-cart','CartController@showToCart')->name('cart.show-to-show');
        Route::delete('/remove-from-cart/{id}','CartController@removeFromCart')->name('cart.remove-from-cart');
    });

});
