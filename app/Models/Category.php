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

    public static function creat($title)
    {
        $category = new static();
        $category->slug = SlugService :: createSlug ( Category :: class, 'slug' , $title);
        $category->save();
        DB::table('category_translates')->insert(array('category_id'=>$category->id, 'title'=>$title));
        return $category;
    }
}
