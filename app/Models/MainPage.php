<?php

namespace App\Models;

use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\MainPage
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MainPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MainPage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MainPage query()
 * @method static \Illuminate\Database\Eloquent\Builder|MainPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MainPage extends BaseModel
{
    use HasFactory, Attachable;



    protected $table = 'main_pages';
    protected $guarded = [];
    protected $translateTable = "App\Models\MainPageTranslate";

    public static function create_item()
    {
        $body = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id et vehicula leo aliquet vivamus. Dignissim feugiat donec et diam elementum, malesuada in dis egestas. Viverra tincidunt id tellus egestas. Vel posuere aenean cras id vel tristique urna. Imperdiet id velit diam, quis viverra. Purus fames eget pulvinar turpis massa orci et. Vitae orci morbi tristique aliquet id. Faucibus semper penatibus diam turpis lacus, sed malesuada nunc facilisis. Mi arcu nulla sed quis. Morbi id ornare et ornare ipsum erat nulla. Urna ultricies neque consectetur mattis. Est scelerisque nec dis curabitur urna ultricies feugiat. Venenatis orci, egestas dolor ut. Elit enim semper mauris pellentesque ac.
Porta a eget donec sed elit suspendisse scelerisque pretium. Lectus ut dolor enim porta velit. Fermentum, ac odio aliquam, arcu, gravida. Nulla nisi, amet bibendum etiam turpis sagittis amet netus odio. Fermentum facilisi etiam tellus etiam pulvinar risus at nisl duis. Sapien tortor at tincidunt convallis vitae porta nec. Quis nunc odio mauris sed varius sit. Volutpat massa in elementum orci enim cursus arcu vitae. Ac auctor tempor gravida morbi leo malesuada faucibus sit nisl. Rutrum accumsan volutpat a libero ut arcu. Quis sit nunc consectetur nec. Varius odio a magna lectus dolor non.
Ut pulvinar ultrices lorem nam ultricies dui. Pulvinar lobortis lorem vivamus in eros, et amet. Volutpat mattis a, tellus hendrerit laoreet viverra pellentesque. Condimentum tristique velit, aliquam ornare eu quisque vulputate. Morbi imperdiet lacus, lacus aliquam. Non tellus turpis sit quam sit. Nibh pellentesque enim magnis elementum, libero, eget ut sed.
Libero tellus, id montes, eget diam cras ullamcorper dui. Nulla scelerisque porta nunc eget consectetur. Rhoncus tempus netus lectus amet lobortis orci donec. Accumsan id vulputate massa, sit at.";
        $main = MainPage::create(['id'=>1]);
        $main->translations()->create(['title'=>'Новая Коллекция', 'body'=>$body]);
        return $main;
    }
}
