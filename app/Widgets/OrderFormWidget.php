<?php

namespace App\Widgets;

use App\Models\NewPostArea;
use App\Models\Shop;

class OrderFormWidget implements ContractWidget
{
    public function execute(){
        $areasNP = NewPostArea::all();
        $shops = Shop::with('city')->get();
        return view('Widgets::order-form', compact('areasNP' , 'shops'));
    }
}
