<?php

namespace App\Models;

use App\Enums\VoteType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'question_id',
        'answer_id',
        'type'
    ];

    protected $casts = [
        'type' => VoteType::class
    ];

    //-------------------------------------------------
    // Relationships
    //-------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
