<?php

namespace App\Traits\Models;

use App\Models\Tag;

trait HasTags
{
	public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}