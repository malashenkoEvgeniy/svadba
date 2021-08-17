<?php

namespace App\Widgets;

use App\Models\Product;

class SimilarWidget implements ContractWidget
{
    protected $sign;
    protected $model;

    public function __construct($model=null){

        if (($model!==null)){
            $this->model = Product::where('silhouette_id', $model->silhouette_id)->get();
            $this->sign = 'silhouette_id';
        } else {

            $this->model = Product::where('is_promotion', 1)->get();
            $this->sign = 'is_promotion';
        }
    }

    public function execute(){

        return view('Widgets::similar', [
            'data' => $this->model,
            'sign' => $this->sign
        ]);
    }

}
