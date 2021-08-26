<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function colors()
    {
        return $this->belongsTo(Colors::class, 'colors_id');
    }

    public function sizes()
    {
        return $this->belongsTo(ClothingSize::class, 'size_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
