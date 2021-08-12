<?php


namespace App\Modules\Home\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\MainPage;
use App\Models\MainSlider;

class HomeController extends BaseController
{
    public function index()
    {
        $main_page = MainPage::first();
        $slider = MainSlider::all();
        $brands = Brand::all();
//        dd($brands->toArray(), count($brands));
//        dd($brands[random_int(0, count($brands)-1)]);
        return view('Home::site.home.index', compact('main_page', 'slider', 'brands'));
    }
}
