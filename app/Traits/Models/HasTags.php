<?php

namespace App\Traits\Models;

trait HasTags
{
	public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}