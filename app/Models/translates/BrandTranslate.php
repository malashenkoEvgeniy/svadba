<?php

namespace App\Models\translates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandTranslate extends Model
{
    use HasFactory;
    protected $table = 'brand_translates';
    protected $guarded = [];
}
