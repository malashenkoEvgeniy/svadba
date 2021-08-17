<?php


namespace App\Modules\Order\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MainPage;
use App\Models\MainSlider;

class OrderController extends BaseController
{
    public function index()
    {


        return view('Order::site.order.index');
    }
}
