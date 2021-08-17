<?php
namespace App\Services;

class ProductService {
    public static function getArrayItems($model, $relation)
    {
        $arr = [];
        foreach($model as $product){
            $arr[] = $product->$relation->id;
        }
        return array_unique($arr);
    }
}
