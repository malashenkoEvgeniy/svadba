<?php

namespace App\Models;

use App\Traits\Attachable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends BaseModel
{
    use HasFactory, Attachable, Sluggable;

    const STORE_PATH = '/uploads/category/';
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

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $table = 'categories';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\CategoryTranslate";

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public static function creat($title, $parent_id = 0, $img = null)
    {
        $category = new static();
        $category->slug = SlugService :: createSlug ( Category :: class, 'slug' , $title);
        $category->parent_id = $parent_id;
        $category->save();
        $category->translations()->create(['title'=>$title]);

        if (isset($img)) {
            $file = BaseModel::storeFileForResize($img, self::STORE_PATH, self::PARAMETERS);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $category->attachments()->save($img);
        }
    }
}
