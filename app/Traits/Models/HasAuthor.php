<?php

namespace App\Traits\Models;

use App\Models\User;

trait HasAuthor
{
	public function author()
    {
        return $this->belongsTo(User::class);
    }
}