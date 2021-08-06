<?php

namespace App\Models;

use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory, Attachable;
    protected $table = 'main_sliders';
    protected $guarded = [];

//    public function function boot()
//    {
//        Post::deleted(function ($post) {
//            $post->comments()->delete();
//        });
//    }
}
