<?php
Route::group(["namespace"=>"App\Modules\Home\Controllers\Site", "prefix" => "/"], function() {
    Route::get('/','HomeController@index')->name('home.index');
});
