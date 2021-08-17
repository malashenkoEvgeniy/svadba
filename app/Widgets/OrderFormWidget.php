<?php

namespace App\Widgets;

class OrderFormWidget implements ContractWidget
{
    public function execute(){

        return view('Widgets::order-form');
    }
}
