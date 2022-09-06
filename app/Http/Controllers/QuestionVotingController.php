<?php

namespace App\Http\Controllers;

use App\Enums\VoteType;
use App\Http\Requests\Question\DownvoteQuestion;
use App\Http\Requests\Question\UpvoteQuestion;
use App\Models\Question;
use App\Models\Vote;

class QuestionVotingController extends Controller
{
    /**
     * Perform upvote to the given question.
     * 
     * @param UpvoteQuestion $request
     * @param Question $question 
     */
    public function upvote(UpvoteQuestion $request, Question $question)
    {
        $newUpvote = $this->toggleVote(VoteType::Upvote, $question);

        return response()->json([
            'newUpvote' => $newUpvote,
        ]);
    }

    /**
     * Perform downvote to the given question.
     * 
     * @param DownvoteQuestion $request
     * @param Question $question 
     */
    public function downvote(DownvoteQuestion $request, Question $question)
    {
        $newDownvote = $this->toggleVote(VoteType::Downvote, $question);

        return response()->json([
            'newDownvote' => $newDownvote,
        ]);
    }

    //-----------------------------------------------
    // Private Functions
    //-----------------------------------------------

    private function toggleVote(VoteType $type, Question $question): bool
    {
        $oldVote = Vote::where('user_id', auth()->id())->where('question_id', $question->id)->first();

        if ($oldVote) {
            if ($oldVote->type == VoteType::Upvote) {
                $question->decrement('votes');
            }
            else {
                $question->increment('votes');
            }

            $oldVote->delete();

            if ($oldVote->type == $type) {
                return false;
            }
        }

        Vote::create([
            'question_id' => $question->id,
            'user_id' => auth()->id(),
            'type' => $type
        ]);

        if ($type == VoteType::Upvote) {
            $question->increment('votes');
        }
        else {
            $question->decrement('votes');
        }

        return true;
    }
}
