<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MainPageTranslate
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $body
 * @property string $language
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property int $main_page_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate query()
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereMainPageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainPageTranslate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MainPageTranslate extends Model
{
    use HasFactory;
    protected $table = 'main_page_translates';
    protected $guarded = [];
}
