<?php


namespace App\Modules\Order\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MainPage;
use App\Models\MainSlider;
use App\Models\NewPostArea;
use App\Services\NewPostServices;
use LisDev\Delivery\NovaPoshtaApi2;

class OrderController extends BaseController
{
    public function index()
    {

//        NewPostServices::settlements();
        //TODO: Проработать использование преложения
        $np = new NovaPoshtaApi2(NewPostServices::API_KEY);
        $city = $np->getCity('Киев', 'Киевская');
        $result = $np->getWarehouses($city['data'][0]['Ref']);
        dd($result);

        return view('Order::site.order.index');
    }
}
