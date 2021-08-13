<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends BaseModel
{
    use HasFactory;

    protected $table = 'shops';
    protected $guarded = [];
    protected $translateTable = "App\Models\\translates\ShopTranslates";


    public static function create_item($title, $address, $email, $phone, $city_id)
    {
        $shop = self::create([
            'email'=>$email,
            'phone'=>$phone,
            'city_id'=>$city_id,
            'working_house' =>'ПН-НД: 09:00 - 20:00'
        ]);
        $shop->translations()->create([
            'title' => $title,
            'address' => $address,
            'language' => 'ru'
        ]);
        return $shop;
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
