<?php

namespace App\Http\Controllers;

use App\Enums\VoteType;
use App\Http\Requests\Answer\DownvoteAnswer;
use App\Http\Requests\Answer\UpvoteAnswer;
use App\Models\Answer;
use App\Models\Vote;

class AnswerVotingController extends Controller
{
    /**
     * Perform upvote to the given answer.
     * 
     * @param UpvoteAnswer $request
     * @param Answer $answer 
     */
    public function upvote(UpvoteAnswer $request, Answer $answer)
    {
        $this->toggleVote(VoteType::Upvote, $answer);

        return response()->json([
            'message' => 'Upvote Saved',
            'status' => 'Ok',
        ]);
    }

    /**
     * Perform downvote to the given answer.
     * 
     * @param DownvoteAnswer $request
     * @param Answer $answer 
     */
    public function downvote(DownvoteAnswer $request, Answer $answer)
    {
        $this->toggleVote(VoteType::Downvote, $answer);

        return response()->json([
            'message' => 'Downvote Saved',
            'status' => 'Ok',
        ]);
    }

    //-----------------------------------------------
    // Private Functions
    //-----------------------------------------------

    private function toggleVote(VoteType $type, Answer $answer)
    {
        $oldVote = Vote::where('user_id', auth()->id())->where('answer_id', $answer->id)->first();

        if ($oldVote) {
            if ($oldVote->type == VoteType::Upvote) {
                $answer->decrement('votes');
            }
            else {
                $answer->increment('votes');
            }

            $oldVote->delete();

            if ($oldVote->type == $type) {
                return;
            }
        }

        Vote::create([
            'answer_id' => $answer->id,
            'user_id' => auth()->id(),
            'type' => $type
        ]);

        if ($type == VoteType::Upvote) {
            $answer->increment('votes');
        }
        else {
            $answer->decrement('votes');
        }
    }
}
