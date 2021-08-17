<?php

namespace App\Widgets;

class ProductCartWidget implements ContractWidget
{
    public function execute(){

        return view('Widgets::product-cart');
    }
}
