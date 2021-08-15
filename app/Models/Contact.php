<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends BaseModel
{
    use HasFactory;
    protected $table = 'contacts';
    protected $guarded = [];

    public static function create_item($email, $phone1, $phone2, $working_house,  $img)
    {
        $contact= self::create([
            'email'=>$email,
            'phone_1'=>$phone1,
            'phone_2'=>$phone2,
            'img'=>$img,
            'working_house'=>$working_house,
        ]);

        return $contact;
    }
}
