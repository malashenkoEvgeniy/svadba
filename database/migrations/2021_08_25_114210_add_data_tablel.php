<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\ClothingSize;
use App\Models\Colors;
use App\Models\Contact;
use App\Models\MainPage;
use App\Models\MainSlider;
use App\Models\Page;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Silhouette;
use App\Models\Textile;
use Illuminate\Database\Migrations\Migration;

class AddDataTablel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        MainPage::create_item();
        MainSlider::create_item([
            '\site\img\slider1.jpg',
            '\site\img\about1.jpg',
        ]);
        Page::create_item('Каталог', 0);
        Page::create_item('Услуги', 1);
        Page::create_item('Акции', 2);
        Page::create_item('Доставка и оплата', 3);
        Page::create_item('О компании', 4);
        Page::create_item('Контакты', 5);
        Page::create_item('Проведение свадеб под ключ', 6, 2, '\site\img\service1.jpg');
        Page::create_item('Подгон платьев по фигуре', 7, 2, '\site\img\service2.jpg');
        Page::create_item('Выездные царемонии', 8, 2, '\site\img\service3.jpg');

        Contact::create(['email'=>'teremki@gmail.com', 'phone_1'=>'096-000-00-00', 'phone_2'=>'096-000-00-00', 'working_house'=>'c 9 do 17', 'logo' =>'/site/img/logo.png']);

        City::create_item('Киев');
        City::create_item('Львов');
        Shop::create_item('Магазин 1','Шевченко, 16', 'teremki@gmail.com', '096-000-00-00', 1 );
        Shop::create_item('Магазин 1','Шевченко, 16', 'teremki@gmail.com', '096-000-00-00', 1 );
        Shop::create_item('Магазин 1','Шевченко, 16', 'teremki@gmail.com', '096-000-00-00', 1 );
        Shop::create_item('Магазин 1','Шевченко, 16', 'teremki@gmail.com', '096-000-00-00', 1 );
        Shop::create_item('Магазин 1','Шевченко, 16', 'teremki@gmail.com', '096-000-00-00', 1 );
        Shop::create_item('Магазин 1', 'Шевченко, 16', 'teremki@gmail.com', '096-000-00-00', 2 );

        (new Category())->creat('Свадебные платья', 0, '\site\img\cat1.jpg');
        (new Category())->creat('Вечерние платья', 0, '\site\img\cat2.jpg');
        (new Category())->creat('Аксессуары', 0, '\site\img\cat3.jpg');
        (new Category())->creat('Naviblue  - USA', 1);
        (new Category())->creat('Brilliance - минимализм', 1);
        (new Category())->creat('Миди, платья для росписи', 1);
        (new Category())->creat('Nora Naviano Italy', 1);
        (new Category())->creat('Blunny Italy', 1);
        (new Category())->creat('Свадебные платья больших размеров', 1);
        (new Category())->creat('Naviblue USA', 2);
        (new Category())->creat('Jovani USA', 2);
        (new Category())->creat('Диадемы, веточки, заколки для невест', 3);
        (new Category())->creat('Пеньюары', 3);
        (new Category())->creat('Фата для невесты', 3);
        (new Category())->creat('Серьги длинные свадебные и вечерние', 3);
        (new Category())->creat('Свадебные и вечерняя обувь, босоножки', 3);
        (new Category())->creat('Шубки норковые, лебяжьи для невест', 3);
        (new Category())->creat('Кружевное болеро для невест', 3);

          Textile::create_item('Сатин');
          Textile::create_item('Шелк');
          Textile::create_item('Лён');
        ClothingSize::create(['size' =>32]);
        ClothingSize::create(['size' =>34]);
        ClothingSize::create(['size' =>36]);
        ClothingSize::create(['size' =>38]);
        ClothingSize::create(['size' =>40]);
        ClothingSize::create(['size' =>42]);


        Brand::creat('Ardeni wedding dresses','Италия', '\site\img\brand1.png' );
        Brand::creat('Elle rosa', 'Италия', '\site\img\brand2.png' );
        Brand::creat('Georjell fashion group', 'Италия', '\site\img\brand3.png' );
        Brand::creat('Tesoro', 'Италия','\site\img\brand4.png' );
        Brand::creat('Lanesta',  'Италия','\site\img\brand5.png' );
        Brand::creat('Brilanta',  'Италия','\site\img\brand6.png' );

        Silhouette::create_item('Пышное', '\site\img\silhouette1.jpg', '\site\img\filter-silhouette1.jpg');
        Silhouette::create_item('Прямое', '\site\img\silhouette2.jpg', '\site\img\filter-silhouette2.jpg');
        Silhouette::create_item('А-силуэт', '\site\img\silhouette3.jpg', '\site\img\filter-silhouette3.jpg');
        Silhouette::create_item('Ампир', '\site\img\silhouette4.jpg', '\site\img\filter-silhouette4.jpg');
        Silhouette::create_item('Русалка', '\site\img\silhouette5.jpg', '\site\img\filter-silhouette5.jpg');

        Colors::create(['meaning'=>'#ffffff'])->translations()->create(['title'=>'Белый']);
        Colors::create(['meaning'=>'#F6EDE5'])->translations()->create(['title'=>'Молочный']);
        Colors::create(['meaning'=>'#EBD1B5'])->translations()->create(['title'=>'Бежевый']);
        Colors::create(['meaning'=>'#C9AAE5'])->translations()->create(['title'=>'Лиловый']);
        Colors::create(['meaning'=>'#E883D7'])->translations()->create(['title'=>'Розовый']);
        Colors::create(['meaning'=>'#F60000'])->translations()->create(['title'=>'Красный']);
        Colors::create(['meaning'=>'#F0C6AA'])->translations()->create(['title'=>'Персиковый']);
        Colors::create(['meaning'=>'#13A485'])->translations()->create(['title'=>'Изумрудный']);

        $data = [
            [
                'title' => 'Verona',
                'price' => 34000,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 1,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>1,
                'new_price' => 30000,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item1.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],
            [
                'title' => 'Litto',
                'price' => 24000,
                'category_id'=>1,
                'brand_id' => 2,
                'silhouette_id' => 2,
                'colors_id' => 2,
                'textile_id' => 2,
                'size_id' => 2,
                'is_promotion' =>1,
                'new_price' => 30000,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item2.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],
            [
                'title' => 'Viola',
                'price' => 14000,
                'category_id'=>1,
                'brand_id' => 3,
                'silhouette_id' => 3,
                'colors_id' => 3,
                'textile_id' => 3,
                'size_id' => 3,
                'is_promotion' =>1,
                'new_price' => 30000,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item3.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],[
                'title' => 'Anetta',
                'price' => 1000,
                'category_id'=>1,
                'brand_id' => 4,
                'silhouette_id' => 4,
                'colors_id' => 4,
                'textile_id' => 1,
                'size_id' => 4,
                'is_promotion' =>1,
                'new_price' => 30000,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item5.jpg',
                'img2'=>'\site\img\item4.jpg',
            ], [
                'title' => 'Nixom',
                'price' => 2200,
                'category_id'=>3,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>1,
                'new_price' => 30000,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item6.jpg',
                'img2'=>'\site\img\item15.jpg',
            ], [
                'title' => 'Lik',
                'price' => 3000,
                'category_id'=>1,
                'brand_id' => 5,
                'silhouette_id' => 5,
                'colors_id' => 5,
                'textile_id' => 1,
                'size_id' => 5,
                'is_promotion' =>1,
                'new_price' => 30000,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item7.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],
            [
                'title' => 'Verona',
                'price' => 34000,
                'category_id'=>3,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>1,
                'is_collection'=>0,
                'img1'=>'\site\img\item8.jpg',
                'img2'=>'\site\img\item13.jpg',
            ],
            [
                'title' => 'Litto',
                'price' => 24000,
                'category_id'=>1,
                'brand_id' => 6,
                'silhouette_id' => 5,
                'colors_id' => 6,
                'textile_id' => 1,
                'size_id' => 6,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>1,
                'is_collection'=>0,
                'img1'=>'\site\img\item9.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],
            [
                'title' => 'Viola',
                'price' => 14000,
                'category_id'=>3,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>1,
                'is_collection'=>0,
                'img1'=>'\site\img\item10.jpg',
                'img2'=>'\site\img\item15.jpg',
            ],[
                'title' => 'Anetta',
                'price' => 1000,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>1,
                'img1'=>'\site\img\item11.jpg',
                'img2'=>'\site\img\item4.jpg',
            ], [
                'title' => 'Nixom',
                'price' => 2200,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 8,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>1,
                'img1'=>'\site\img\item12.jpg',
                'img2'=>'\site\img\item4.jpg',
            ], [
                'title' => 'Lik',
                'price' => 3000,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>1,
                'img1'=>'\site\img\item14.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],  [
                'title' => 'Nixom',
                'price' => 2200,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item16.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],[
                'title' => 'Anetta',
                'price' => 1000,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item5.jpg',
                'img2'=>'\site\img\item4.jpg',
            ], [
                'title' => 'Nixom',
                'price' => 2200,
                'category_id'=>3,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item6.jpg',
                'img2'=>'\site\img\item15.jpg',
            ], [
                'title' => 'Lik',
                'price' => 3000,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item7.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],
            [
                'title' => 'Verona',
                'price' => 34000,
                'category_id'=>3,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item8.jpg',
                'img2'=>'\site\img\item13.jpg',
            ],
            [
                'title' => 'Litto',
                'price' => 24000,
                'category_id'=>1,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item9.jpg',
                'img2'=>'\site\img\item4.jpg',
            ],
            [
                'title' => 'Viola',
                'price' => 14000,
                'category_id'=>3,
                'brand_id' => 1,
                'silhouette_id' => 1,
                'colors_id' => 7,
                'textile_id' => 1,
                'size_id' => 1,
                'is_promotion' =>0,
                'new_price' => 0,
                'is_new'=>0,
                'is_collection'=>0,
                'img1'=>'\site\img\item10.jpg',
                'img2'=>'\site\img\item15.jpg',
            ],
        ];
        for ($i = 0; $i<count($data); $i++){

            Product::create_item($data[$i]['title'],
                'a'.$i,
                $data[$i]['price'],
                $data[$i]['category_id'],
                $data[$i]['brand_id'],
                $data[$i]['silhouette_id'],
                $data[$i]['colors_id'],
                $data[$i]['textile_id'],
                $data[$i]['size_id'],
                $data[$i]['is_promotion'],
                $data[$i]['new_price'],
                $data[$i]['is_new'],
                $data[$i]['is_collection'],
                [
                    $data[$i]['img1'],
                    $data[$i]['img2'],
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
