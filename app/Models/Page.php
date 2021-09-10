<?php

namespace App\Models;

use App\Traits\Attachable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends BaseModel
{
    use HasFactory, Attachable, Sluggable;

    const STORE_PATH = '/uploads/pages/';
    const PARAMETERS = [
        'img_d_w' => 638,
        'img_d_h' => 764,
        'img_t_w' => 265,
        'img_t_h' => 368,
        'img_m_w' => 320,
        'img_m_h' => 368,
        'img_p_w' => 80,
        'img_p_h' => 100,
    ];

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

    public static function create_item($title, $order_by, $parent_id = 0, $img = null, $body = null)
    {
        $page = self::create([
            'slug'=>SlugService :: createSlug ( Page :: class, 'slug' , $title ),
            'order_by'=> $order_by,
            'parent_id'=>$parent_id
        ]);

        if (isset($img)) {
            $file = BaseModel::storeFileForResize($img, self::STORE_PATH, self::PARAMETERS);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $page->attachments()->save($img);
        }
        $page->translations()->create([
            'title'=>$title,
            'language'=>'ru',
            'body'=>$body
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
