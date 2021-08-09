<?php

namespace App\Models\translates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslate extends Model
{
    use HasFactory;
    protected $table = 'product_translates';
    protected $guarded = [];
}
