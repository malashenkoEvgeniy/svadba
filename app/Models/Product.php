<?php

namespace App\Models;

use App\Traits\Attachable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
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
    protected $table = 'products';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\ProductTranslate";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
