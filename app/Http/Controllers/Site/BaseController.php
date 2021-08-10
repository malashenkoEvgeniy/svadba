<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct(){

    }
//    function __construct(){
//        $settings = Settings::find(1);
//        $categories = Category::where('parent_id', null)->with('children')->get();
//        $pages = Page::where('parent_id', null)->with('getKids')->orderby('order_by')->get();
//        $interesting = Page::where('parent_id', 1)->get();
//        $certificates = Certificates::get();
//        view()->share(compact('settings','certificates', 'categories','interesting', 'pages'));
//    }
}
