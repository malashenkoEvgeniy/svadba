<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends BaseModel
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\CityTranslates";

    public function shops()
    {
        return $this->hasMany(Shop::class, 'city_id');
    }

    public static function create_item($title)
    {
        $page = self::create();
        $page->translations()->create([
            'title' => $title,
            'language' => 'ru'
        ]);
        return $page;
    }
}
