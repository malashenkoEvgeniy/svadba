<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Textile extends BaseModel
{
    use HasFactory;

    protected $table = 'textiles';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\TextileTranslates";

    public static function create_item($title)
    {
        $textile = Textile::create();
        $textile->translations()->create([
            'title'=>$title,
            'language'=>'ru'
        ]);
        return $textile;
    }

}
