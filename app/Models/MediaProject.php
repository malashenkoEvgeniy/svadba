<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaProject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(Attach::class);
    }

    /**
     * Relation for project employees
     * @return MorphToMany
     */
    public function home()
    {
        return $this->morphedByMany(MainPage::class, 'attachable', 'attaches');
    }

    /**
     * Relation for project teams
     * @return MorphToMany
     */
    public function category()
    {
        return $this->morphedByMany(Category::class, 'attachable', 'attaches');
    }
}
