<?php

namespace App\Widgets;

use App\Models\Product;

class ProductWidget implements ContractWidget
{
    protected $model;

    public function __construct($data = []){

        if (isset($data['model'])){
            $this->model = $data['model'];

        }
    }

    public function execute(){

        return view('Widgets::product', [
            'model' => $this->model
        ]);
    }
}
