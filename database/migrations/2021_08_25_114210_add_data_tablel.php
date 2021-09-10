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
        $dilivery_body = " <h2 style=\"font-weight: bold; text-align:center\">Доставка</h2><h3 >Новая почта</h3><ul style=\"list-style:disc; padding-left:20px\"> <li>Отправляем ежедневно с понедельника по пятницу при условии, что заказ оплачен до 14 часов.</li><li>Оплаченные заказы после 14 часов отправляются на следующий день.</li><li>Время доставки Вашей посылки компанией «Новая почта» в пункт назначения обычно составляет не более 3-х рабочих дней.&nbsp;</li> </ul><h3>Курьер по Киеву</h3><ul style=\"list-style:disc; padding-left:20px\">        <li>Отправляем ежедневно с понедельника по пятницу при условии, что заказ оплачен до 14 часов.</li><li>Оплаченные заказы после 14 часов отправляются на следующий день.</li> </ul> <h3>Самовывоз с магазина</h3><ul style=\"list-style:disc; padding-left:20px\"> <li>Вы можете забронировать товары на срок до 5 дней.</li><li>Список наших магазинов и шоу-румов, а также график работы смотрите здесь.</li> <li>Для полного удобства покупателей услуга предусматривает возможность примерить и забронировать одежду в одном магазине, а забрать ее в течение 5 дней в другом - по удобной вам адресу.</li></ul> <h3 style=\"font-weight: bold; text-align:center\">Оплата</h3><h3>Оплата заказа возможна:</h3> <ul style=\"list-style:disc; padding-left:20px\"> <li>Наличными курьеру в момент доставки</li> <li>Наложенный платеж при получении товара службой доставки.</li> <li>Банковской картой Visa и MasterCard с помощью систем оплаты LiqPay, Portmone, Google Pay, Apple Pay, Click to Pay, Masterpass.</li></ul>";
        $service_body = "<div class=\"about_us-wrap\"><h1 class=\"about_us_main_title\">Lorem ipsum dolor sit amet consectetur</h1>   <div class=\"about_us_first\"> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id et vehicula leo aliquet vivamus. Dignissim feugiat donec et diam elementum, malesuada in dis egestas. Viverra tincidunt id tellus egestas. Vel posuere aenean cras id vel tristique urna. Imperdiet id velit diam, quis viverra. Purus fames eget pulvinar turpis massa orci et. Vitae orci morbi tristique aliquet id. Faucibus semper penatibus diam turpis lacus, sed malesuada nunc facilisis. Mi arcu nulla sed quis. Morbi id ornare et ornare ipsum erat nulla. Urna ultricies neque consectetur mattis. Est scelerisque nec dis curabitur urna ultricies feugiat. Venenatis orci, egestas dolor ut. Elit enim semper mauris pellentesque ac. Porta a eget donec sed elit suspendisse scelerisque pretium. Lectus ut dolor enim porta velit. Fermentum, ac odio aliquam, arcu, gravida. Nulla nisi, amet bibendum etiam turpis sagittis amet netus odio. Fermentum facilisi etiam tellus etiam pulvinar risus at nisl duis. Sapien tortor at tincidunt convallis vitae porta nec. Quis nunc odio mauris sed varius sit. Volutpat massa in elementum orci enim cursus arcu vitae. Ac auctor tempor gravida morbi leo malesuada faucibus sit nisl. Rutrum accumsan volutpat a libero ut arcu. Quis sit nunc consectetur nec. Varius odio a magna lectus dolor non. Ut pulvinar ultrices lorem nam ultricies dui. Pulvinar lobortis lorem vivamus in eros, et amet. Volutpat mattis a, tellus hendrerit laoreet viverra pellentesque. Condimentum tristique velit, aliquam ornare eu quisque vulputate. Morbi imperdiet lacus, lacus aliquam. Non tellus turpis sit quam sit. Nibh pellentesque enim magnis elementum, libero, eget ut sed.</p> <figure class=\"image\"><img src=\"/public/ckfinder/userfiles/images/about1.jpg\"></figure> </div>  <div class=\"about_us_second\"> <figure class=\"image\"><img src=\"/public/ckfinder/userfiles/images/about2.jpg\"></figure> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id et vehicula leo aliquet vivamus. Dignissim feugiat donec et diam elementum, malesuada in dis egestas. Viverra tincidunt id tellus egestas. Vel posuere aenean cras id vel tristique urna. Imperdiet id velit diam, quis viverra. Purus fames eget pulvinar turpis massa orci et. Vitae orci morbi tristique aliquet id. Faucibus semper penatibus diam turpis lacus, sed malesuada nunc facilisis. Mi arcu nulla sed quis. Morbi id ornare et ornare ipsum erat nulla. Urna ultricies neque consectetur mattis. Est scelerisque nec dis curabitur urna ultricies feugiat. Venenatis orci, egestas dolor ut. Elit enim semper mauris pellentesque ac. Porta a eget donec sed elit suspendisse scelerisque pretium. Lectus ut dolor enim porta velit. Fermentum, ac odio aliquam, arcu, gravida. Nulla nisi, amet bibendum etiam turpis sagittis amet netus odio. Fermentum facilisi etiam tellus etiam pulvinar risus at nisl duis. Sapien tortor at tincidunt convallis vitae porta nec. Quis nunc odio mauris sed varius sit. Volutpat massa in elementum orci enim cursus arcu vitae. Ac auctor tempor gravida morbi leo malesuada faucibus sit nisl. Rutrum accumsan volutpat a libero ut arcu. Quis sit nunc consectetur nec. Varius odio a magna lectus dolor non. Ut pulvinar ultrices lorem nam ultricies dui. Pulvinar lobortis lorem vivamus in eros, et amet. Volutpat mattis a, tellus hendrerit laoreet viverra pellentesque. Condimentum tristique velit, aliquam ornare eu quisque vulputate. Morbi imperdiet lacus, lacus aliquam. Non tellus turpis sit quam sit. Nibh pellentesque enim magnis elementum, libero, eget ut sed.</p> </div>    </div>";
        MainPage::create_item();
        MainSlider::create_item([
            '\site\img\slider1.jpg',
            '\site\img\about1.jpg',
        ]);
        Page::create_item('Каталог', 0);
        Page::create_item('Услуги', 1);
        Page::create_item('Акции', 2);
        Page::create_item('Доставка и оплата', 3, 0, null, $dilivery_body);
        Page::create_item('О компании', 4, 0, null, $service_body);
        Page::create_item('Контакты', 5);
        Page::create_item('Проведение свадеб под ключ', 6, 2, '\site\img\service1.jpg',$service_body);
        Page::create_item('Подгон платьев по фигуре', 7, 2, '\site\img\service2.jpg', $service_body);
        Page::create_item('Выездные царемонии', 8, 2, '\site\img\service3.jpg', $service_body);

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
