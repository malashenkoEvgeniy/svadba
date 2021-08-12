<?php

namespace App\Models\translates;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslates extends Model
{
    use HasFactory;
    protected $table = 'page_translates';
    protected $guarded = [];
}
