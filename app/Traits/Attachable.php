<?php

namespace App\Traits;

use App\Models\MediaProject;

trait Attachable
{
    public function attachments()
    {
        return $this->morphToMany(MediaProject::class, 'attachable', 'attaches');
    }
}
