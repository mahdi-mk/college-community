<?php

namespace App\Models;

use App\Traits\Models\HasAuthor;
use App\Traits\Models\HasTags;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTags;
    use HasAuthor;

    protected $fillable = [
        'content',
        'author_id',
        'question_id',
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
    
    //-------------------------------------------------
    // Relationships
    //-------------------------------------------------

    public function question() 
    {
        return $this->belongsTo(Question::class);
    }

    public function votes() 
    {
        return $this->hasMany(Vote::class);
    }

    public function authUserVote()
    {
        return $this->hasOne(Vote::class)->where('user_id', auth()->id());
    }
}
