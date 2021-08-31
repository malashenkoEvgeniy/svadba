<?php

namespace App\Widgets;

use App\Models\NewPostArea;

class OrderFormWidget implements ContractWidget
{
    public function execute(){
        $areasNP = NewPostArea::all();
        return view('Widgets::order-form', compact('areasNP'));
    }
}
