<?php


namespace App\Modules\Home\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MainPage;
use App\Models\MainSlider;
use App\Models\Page;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $main_page = MainPage::first();
        $slider = MainSlider::all();
        $brands = Brand::all();

        return view('Home::site.home.index', compact('main_page', 'slider', 'brands'));
    }

    public function fittingForms(Request $request)
    {
        return response()->json($request->name);
    }
}
