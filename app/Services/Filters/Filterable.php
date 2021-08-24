<?php

namespace App\Services\Filters;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

interface Filterable
{
    public static function apply(Builder $builder, $value);
}
