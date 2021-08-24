<?php
namespace App\Services;

class ProductService {
    public static function getArrayItems($model, $relation, $id='id')
    {
        $arr = [];
        foreach($model as $product){
            $arr[] = $product->$relation->$id;
        }
        return array_unique($arr);
    }

    public static function getArrayItemsOptions($model, $id='colors_id')
    {
        $arr = [];
        foreach($model as $product){
            foreach ($product->options as $option){
                $arr[] = $option->$id;
            }

        }
        return array_unique($arr);
    }

    public static function getCountProducts($model)
    {
        $counter = 0;
        foreach($model->options as $option){
            if($option->available_quantity<0){
                $counter += 0;
            } else {
                $counter += $option->available_quantity;
            }

        }
        return $counter;
    }
}
