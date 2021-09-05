<?php

namespace App\Models\Filters\Product;

use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Brand implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        return $builder->whereIn('brand_id', $value);
    }
}
