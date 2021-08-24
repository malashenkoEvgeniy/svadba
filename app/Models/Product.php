<?php

namespace App\Models;

use App\Traits\Attachable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory, Attachable, Sluggable;

    const STORE_PATH = '/uploads/product/';
    const PARAMETERS = [
        'img_d_w' => 450,
        'img_d_h' => 640,
        'img_t_w' => 750,
        'img_t_h' => 350,
        'img_m_w' => 300,
        'img_m_h' => 300,
        'img_p_w' => 100,
        'img_p_h' => 75,
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
    protected $table = 'products';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\ProductTranslate";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function options()
    {
        return $this->hasMany(ProductOption::class, 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function silhouette()
    {
        return $this->belongsTo(Silhouette::class);
    }

    public function color()
    {
        return $this->belongsTo(Colors::class, 'colors_id');
    }

    public function textile()
    {
        return $this->belongsTo(Textile::class);
    }

    public function size()
    {
        return $this->belongsTo(ClothingSize::class);
    }

    public static function create_item($title,
                                       $vendor_code,
                                       $price,
                                       $category_id,
                                       $brand_id,
                                       $silhouette_id,
                                       $colors_id,
                                       $textile_id,
                                       $size_id,
                                       $is_promotion = 0,
                                       $new_price =0,
                                       $is_new = 0,
                                       $is_collection = 0,
                                       $img= [])
    {


        $slug =  SlugService :: createSlug ( Product :: class, 'slug' , $title);

        $product = Product::create([
            'slug'=>$slug,
            'vendor_code'=>$vendor_code,
            'price'=>$price,
            'category_id'=>$category_id,
            'brand_id' => $brand_id,
            'silhouette_id' => $silhouette_id,
            'textile_id' => $textile_id,
            'available' => 1,
            'is_promotion'=>$is_promotion,
            'new_price'=>$new_price,
            'is_new'=>$is_new,
            'is_collection'=>$is_collection

        ]);

        ProductOption::create([
            'product_id'=>$product->id,
            'colors_id' => $colors_id,
            'size_id' => $size_id,
            'available_quantity' =>3
        ]);




        $product->translations()->create([
            'title'=>$title,
            'language'=>'ru'
        ]);

        if (count($img)) {
            foreach ($img as $item) {
                $file = BaseModel::storeFileForResize($item, self::STORE_PATH, self::PARAMETERS);
                $main_img = new MediaProject([
                    'img_f' => $file['pathF'],
                    'img_d' => $file['pathD'],
                    'img_t' => $file['pathT'],
                    'img_m' => $file['pathM'],
                    'img_prev' => $file['pathP'],
                ]);
                $product->attachments()->save($main_img);
            }
        }
        return $product;
    }

}
