<?php

namespace App\Widgets;

class FittingFormWidget implements ContractWidget
{
    public function execute(){

        return view('Widgets::fitting-form');
    }
}
