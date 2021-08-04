<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class MainPage extends Model
{
    use HasFactory;
    protected $table = 'main_pages';
    protected $guarded = [];
    protected $translateTable = "App\Models\MainPageTranslate";
}
