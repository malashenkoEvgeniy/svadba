<?php

namespace App\Widgets;

use App\Models\Product;

class SimilarWidget implements ContractWidget
{
    protected $sign;
    protected $model;

    public function __construct($data = []){
        if (isset($data['sign'])){
            $this->sign = $data['sign'];
            $this->model = $data['model'];
        } else {
            $this->sign = 'is_promotion';
        }
    }

    public function execute(){
        if($this->sign == 'is_promotion'){
            $data = Product::where('is_promotion', 1)->get();
        }
        if($this->sign == 'similar'){
            $data = Product::where('is_promotion', 1);
        }

        return view('Widgets::similar', [
            'data' => $data,
            'sign' => $this->sign
        ]);
    }

}
