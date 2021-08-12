<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends BaseModel
{
    use HasFactory, Sluggable;
    protected $table = 'pages';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\PageTranslates";

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function create_item($title, $order_by, $parent_id = 0)
    {
        $page = self::create([
            'slug'=>SlugService :: createSlug ( Page :: class, 'slug' , $title ),
            'order_by'=> $order_by,
            'parent_id'=>$parent_id
        ]);
        $page->translations()->create([
            'title'=>$title,
            'language'=>'ru'
        ]);
        return $page;
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }


    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id')->with('current');
    }


}
