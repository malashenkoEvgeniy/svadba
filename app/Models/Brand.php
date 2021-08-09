<?php

namespace App\Models;

use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends  BaseModel
{
    use HasFactory, Attachable;

    protected $table = 'brands';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\BrandTranslate";

}
