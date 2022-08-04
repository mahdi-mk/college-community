<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    //-------------------------------------------------
    // Relationships
    //-------------------------------------------------

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'taggable');
    }

    public function answers()
    {
        return $this->morphedByMany(Answer::class, 'taggable');
    }
}
