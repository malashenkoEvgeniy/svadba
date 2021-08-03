<?php

use App\Modules\Home\Controllers\Admin\HomeController;

Route::group(['prefix'=>'admin'], function (){
    Route::get('/',[HomeController::class, 'index']);
});
