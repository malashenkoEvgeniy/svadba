<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends BaseModel
{
    use HasFactory;
    protected $table = 'contacts';
    protected $guarded = [];

    public static function create_item($email, $phone)
    {
        $contact= self::create([
            'email'=>$email,
            'phone_1'=>$phone
        ]);

        return $contact;
    }
}
