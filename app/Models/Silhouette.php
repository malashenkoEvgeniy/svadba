<?php

namespace App\Models;

use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Silhouette extends BaseModel
{
    use HasFactory, Attachable;

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

    protected $table = 'silhouettes';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\\SilhouetteTranslates";

    public static function create_item($title, $img = null, $scheme = null)
    {
        $silhouette = new static();
        $silhouette->scheme = $scheme;
        $silhouette->save();
        $silhouette->translations()->create(['title'=>$title, 'language'=>'ru']);

        if (isset($img)) {
            $file = BaseModel::storeFileForResize($img, self::STORE_PATH, self::PARAMETERS);
            $img = new MediaProject([
                'img_f' => $file['pathF'],
                'img_d' => $file['pathD'],
                'img_t' => $file['pathT'],
                'img_m' => $file['pathM'],
                'img_prev' => $file['pathP'],
            ]);
            $silhouette->attachments()->save($img);
        }
        return $silhouette;
    }
}
