<?php

namespace App\Models\translates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslate extends Model
{
    use HasFactory;
    protected $table = 'category_translates';
    protected $guarded = [];
}
