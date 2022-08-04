<?php

namespace App\Traits\Models;

trait HasAuthor
{
	public function author()
    {
        return $this->belongsTo(User::class);
    }
}