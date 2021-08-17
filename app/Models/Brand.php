<?php

namespace App\Models;

use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends  BaseModel
{
    use HasFactory, Attachable;

    const STORE_PATH = '/uploads/brands/';
    const PARAMETERS = [
        'img_d_w' => 180,
        'img_d_h' => 115,
        'img_t_w' => 103,
        'img_t_h' => 66,
        'img_m_w' => 72,
        'img_m_h' => 46,
        'img_p_w' => 72,
        'img_p_h' => 46,
    ];

    protected $table = 'brands';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\BrandTranslate";

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function creat($title, $made_in_country,  $img = null)
    {
        $brand = Brand::create();
        $brand->translations()->create([
            'title'=>$title,
            'made_in_country'=>$made_in_country,

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
            $brand->attachments()->save($img);
        }
    }

}
