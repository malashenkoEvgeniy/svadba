<?php
Route::group(["namespace"=>"App\Modules\Home\Controllers", "prefix" => "home"], function() {
    Route::get('/','HomeController@index')->name('home.index');
});
