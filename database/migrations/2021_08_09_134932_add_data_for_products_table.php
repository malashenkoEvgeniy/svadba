<?php

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataForProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   $data = [
        [
            'title' => 'Verona',
            'price' => 34000,
            'new_price' => 30000,
            'category_id'=>1,
            'is_promotion' =>1
            ],
        [
            'title' => 'Litto',
            'price' => 24000,
            'new_price' => 20000,
            'category_id'=>1,
            'is_promotion' =>1
        ],
        [
            'title' => 'Viola',
            'price' => 14000,
            'new_price' => 10000,
            'category_id'=>1,
            'is_promotion' =>1
        ],[
            'title' => 'Anetta',
            'price' => 1000,
            'new_price' => 3000,
            'category_id'=>1,
            'is_promotion' =>1
        ], [
            'title' => 'Nixom',
            'price' => 2200,
            'new_price' => 3000,
            'category_id'=>1,
            'is_promotion' =>1
        ], [
            'title' => 'Lik',
            'price' => 3000,
            'new_price' => 20000,
            'category_id'=>1,
            'is_promotion' =>1
        ]
        ];
        foreach ($data as $item){

            $model = \App\Models\Product::create([
                'slug'=> SlugService :: createSlug ( Product :: class, 'slug' , $item['title']),
                'vendor_code' =>SlugService :: createSlug ( Product :: class, 'slug' , $item['title']),
                'price'=>$item['price'],
                'new_price'=>$item['new_price'],
                'category_id'=>$item['category_id'],
                'is_promotion'=>$item['is_promotion']
            ])->translations()->create([
                'title'=>$item['title'],
                'language'=>'ru'
            ]);
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
