<?php

namespace App\Models;

use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory, Attachable;
    protected $table = 'main_sliders';
    protected $guarded = [];

    const STORE_PATH = '/uploads/main-pages/';
    const PARAMETERS = [
        'img_d_w' => 1024,
        'img_d_h' => 520,
        'img_t_w' => 750,
        'img_t_h' => 350,
        'img_m_w' => 300,
        'img_m_h' => 300,
        'img_p_w' => 100,
        'img_p_h' => 75,
    ];

    public static function create_item($img=[])
    {
        $slider = MainSlider::create();

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
                $slider->attachments()->save($main_img);
            }
        }
        return $slider;
    }
}
