<?php

namespace App\Models\Filters\Product;

use App\Models\ProductOption;
use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Size implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        $arr= [];
        $options = ProductOption::whereIn('size_id', $value)->get();
        foreach ($options as $item){
            $arr[]= $item->product_id;
        }
        return $builder->whereIn('id', $arr);
    }
}
