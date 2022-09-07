<?php

namespace App\Models;

use App\Builders\QuestionBuilder;
use App\Traits\Models\HasAuthor;
use App\Traits\Models\HasTags;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTags;
    use HasAuthor;

    protected $fillable = [
        'title',
        'content',
        'votes',
        'author_id'
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }

    public function newEloquentBuilder($query)
    {
        return new QuestionBuilder($query);
    }


    //-------------------------------------------------
    // Relationships
    //-------------------------------------------------

    public function answers() 
    {
        return $this->hasMany(Answer::class);
    }

    public function votes() 
    {
        return $this->hasMany(Vote::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function authUserVote() 
    {
        return $this->hasOne(Vote::class)->where('user_id', auth()->id());
    }
}
