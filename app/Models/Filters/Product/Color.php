<?php

namespace App\Models\Filters\Product;

use App\Models\ProductOption;
use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Color implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        $arr= [];
        $options = ProductOption::whereIn('colors_id', $value)->get();
        foreach ($options as $item){
            $arr[]= $item->product_id;
        }
        return $builder->whereIn('id', $arr);
    }
}
