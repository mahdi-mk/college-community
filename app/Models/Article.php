<?php

namespace App\Models;

use App\Traits\Models\HasAuthor;
use App\Traits\Models\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTags;
    use HasAuthor;

    protected $fillable = [
        'title',
        'description',
        'content',
        'poster',
        'author_id'
    ];
}
