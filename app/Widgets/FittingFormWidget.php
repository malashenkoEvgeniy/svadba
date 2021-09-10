<?php

namespace App\Widgets;

use App\Models\Shop;

class FittingFormWidget implements ContractWidget
{

    public $is_autofocus;

    public function __construct($is_autofocus=null){

        if ($is_autofocus !== []){
            $this->is_autofocus = $is_autofocus;
        } else {
            $this->is_autofocus = 1;
        }
    }
    public function execute(){
        $shops = Shop::with('city')->get();
        return view('Widgets::fitting-form', [
            'is_autofocus' => $this->is_autofocus,
            'shops'=>$shops
        ]);
    }
}
