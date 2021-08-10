<?php


namespace App\Modules\Home\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\MainPage;
use App\Models\MainSlider;

class HomeController extends BaseController
{
    public function index()
    {
        $page = MainPage::first();
        $slider = MainSlider::all();
        return view('Home::site.home.index', compact('page', 'slider'));
    }
}
