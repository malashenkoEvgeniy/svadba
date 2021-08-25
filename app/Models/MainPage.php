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
        $body = @include('includes.admin.temp-template-seo') ;
        $main = MainPage::create(['id'=>1]);
        $main->translations()->create(['title'=>'Новая Коллекция', 'body'=>$body]);
        return $main;
    }
}
