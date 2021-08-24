<?php

namespace App\Models\Filters\Product;

use App\Models\Product;
use App\Services\Filters\Searchable;
use App\Traits\BaseSearch;
use Illuminate\Http\Request;

class ProductSearch implements Searchable
{
    const MODEL = Product::class;

   use BaseSearch;
}
