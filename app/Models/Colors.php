<?php

namespace App\Models;

use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends BaseModel
{
    use HasFactory, Attachable;

    protected $table = 'colors';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\ColorsTranslate";

}
