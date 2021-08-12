<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\FormRequest;
use App\Models\Page;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class BaseController extends Controller
{
    public function __construct()
    {
//        $newRequests = FormRequest::new ()->orderBy('created_at')->count();
//        view()->share(compact('newRequests'));
            $pages = Page::where('parent_id', 0)->orderBy('order_by')->get();
            $contacts = Contact::where('id', 1)->first();

            view()->share(compact('pages', 'contacts'));
    }

    public function translit($value)
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

    public function storeFile($file, $storePath = '/uploads/')
    {
        $fileNewName = time() . $file->getClientOriginalName();
        $fileNewName = $this->translit($fileNewName);

        $file->move(public_path() . $storePath, $fileNewName);
        $data = ['name' => $fileNewName, 'format' => $file->getClientOriginalExtension(), 'path' => $storePath . $fileNewName];

        return $data;
    }

    public function storeFileForResize( $file, $storePath = '/uploads/', $parameters=null)
    {

        $fileNewName = time() . $file->getClientOriginalName();
        $fileNewName = $this->translit($fileNewName);
        $manager= new ImageManager(['driver'=>'gd']);
        $image = $manager->make($file);
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
            'format' => $file->getClientOriginalExtension(),
            'pathF' => $storePath .'f'. $fileNewName,
            'pathD' =>  $storePath .'d'. $fileNewName,
            'pathT' => $storePath .'t'. $fileNewName,
            'pathM' => $storePath .'m'. $fileNewName,
            'pathP' => $storePath .'p'. $fileNewName,
            ];

        return $data;
    }

    public static function getWaterMark(){
        ini_set('max_execution_time', 1800);
        $dir = "uploads/projects1/*";
        foreach(glob($dir) as $file)
        {
            if(!is_dir($file)) {
                $fileNewName = basename($file);
                $manager= new ImageManager(['driver'=>'gd']);
                $image = $manager->make($file);
                $water = $manager->make('img/logo.png');
                $width = Image::make($image)->width();
                $height = Image::make($image)->height();
                $water->resize( $width*0.3,$height*0.3, function ($img){
                    $img->aspectRatio();
                });
                $image->insert($water, 'center', 10, 10);
                $str = public_path() .'/uploads/projects/'. $fileNewName;
                $image->save($str,75);
            }
        }
        return 'fff';
    }

    public function deleteFile($path)
    {
        if ($path !== null) {
            if (file_exists(public_path($path))) {
                return unlink(public_path($path));
            }
        }
    }

    public function storeWithTranslation($model, $data, $translation)
    {
        $model = $model::create($data);
        $translation = $model->translations()->create($translation);
        return compact('model', 'translation');
    }

    public function updateTranslation($model, $translationData, $request = null)
    {
        $recordTranslation = $model->translate(); // Ищем запись по текущему языку

        if ($recordTranslation !== null && $recordTranslation->language == App::getLocale()) { //Нашли запись и текущий язык сайта совпадает с записью? да = обновляем
            $recordTranslation->update($translationData);
        } else { // создаём новый перевод
            $model = $model->translations()->create($translationData);
        }

        return $model;
    }

    public function storeImage(Request $request)
    {
        $file = $this->storeFile(request()->file('file'), $this->storePath);
        return json_encode(['location' => $file['path']]);
    }
}
