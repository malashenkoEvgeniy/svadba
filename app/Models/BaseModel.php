<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use SplFileInfo;


class BaseModel extends Model
{
    protected $translateTable;

    public function translate()
    {
        $locale = App::getLocale();

        $response = $this->hasMany($this->translateTable)->where('language', $locale)->first();

        if ($response === null) {
            $response = $this->hasMany($this->translateTable)->where('language', 'en')->first();
        }

        if ($response === null) {
            $response = $this->hasMany($this->translateTable)->where('language', 'ua')->first();
        }

        if ($response === null) {
            $response = $this->hasMany($this->translateTable)->where('language', 'ru')->first();
        }

        if ($response === null) {
            App::abort(404);
        }

        return $response;
    }

    public function translate_test()
    {
        $locale = App::getLocale();

        $response = $this->hasMany($this->translateTable)->get();

        if ($response === null) {
            App::abort(404);
        }

        return $response;
    }

    public function translations()
    {
        return $this->hasMany($this->translateTable);
    }

    public static function translit($value)
    {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        );

        $value = mb_strtolower($value);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z^.]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        $value = trim($value, '-');

        return $value;
    }

    public static function storeFileForResize( $img, $storePath = '/uploads/', $parameters=null)
    {
        $file = basename(public_path() .$img);
        $extension = pathinfo(public_path() .$img, PATHINFO_EXTENSION);

        $fileNewName = time() . $file;
        $fileNewName = self::translit($fileNewName);
        $manager= new ImageManager(['driver'=>'gd']);

        $image = $manager->make(public_path() .$img);
        $width = Image::make($image)->width();
        $height = Image::make($image)->height();
        $strF = public_path() . $storePath .'f'. $fileNewName;
        $strD = public_path() . $storePath .'d'. $fileNewName;
        $strT = public_path() . $storePath .'t'. $fileNewName;
        $strM = public_path() . $storePath .'m'. $fileNewName;
        $strP = public_path() . $storePath .'p'. $fileNewName;
        $start_img = [
            'img_f_w' => 1900,
            'img_f_h' => 900,
        ];

        if($width>$height){
            if( $start_img['img_f_w'] < $width ) {
                $image->resize($start_img['img_f_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strF,75);
            } else {
                $image->save($strF,75);
            }
            if( $parameters['img_d_w'] < $width ) {
                $image->resize($parameters['img_d_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strD,75);
            } else {
                $image->save($strD,75);
            }
            if( $parameters['img_t_w'] < $width ) {
                $image->resize($parameters['img_t_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strT,75);
            } else {
                $image->save($strT,75);
            }
            if( $parameters['img_m_w'] < $width ) {
                $image->resize($parameters['img_m_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strM,75);
            } else {
                $image->save($strM,75);
            }
            if( $parameters['img_p_w'] < $width ) {
                $image->resize($parameters['img_p_w'], null, function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strP,75);
            } else {
                $image->save($strP,75);
            }

        } else {
            if( $start_img['img_f_h'] < $height ) {
                $image->resize(null, $start_img['img_f_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strF,75);
            } else {
                $image->save($strF,75);
            }
            if( $parameters['img_d_h'] < $height ) {
                $image->resize(null, $parameters['img_d_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strD,75);
            } else {
                $image->save($strD,75);
            }
            if( $parameters['img_t_h'] < $height ) {
                $image->resize(null, $parameters['img_t_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strT,75);
            } else {
                $image->save($strT,75);
            }
            if( $parameters['img_m_h'] < $height ) {
                $image->resize(null, $parameters['img_m_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strM,75);
            } else {
                $image->save($strM,75);
            }
            if( $parameters['img_p_h'] < $height ) {
                $image->resize(null, $parameters['img_p_h'],  function ($img) {
                    $img->aspectRatio();
                });
                $image->save($strP,75);
            } else {
                $image->save($strP,75);
            }
        }

        $data = [
            'name' => $fileNewName,
            'format' => $extension,
            'pathF' => $storePath .'f'. $fileNewName,
            'pathD' =>  $storePath .'d'. $fileNewName,
            'pathT' => $storePath .'t'. $fileNewName,
            'pathM' => $storePath .'m'. $fileNewName,
            'pathP' => $storePath .'p'. $fileNewName,
        ];

        return $data;
    }


}
