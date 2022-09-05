<?php

namespace App\Http\Controllers;

use App\Models\Question;

class GetQuestionAnswersController extends Controller
{
    public function __invoke(Question $question)
    {
        return response()->json([
            'answers' => $question->answers()->with([
                'author:id,first_name,last_name',
                'authUserVote:id,answer_id,type'
            ])
            ->select('id', 'author_id', 'content', 'votes', 'created_at')
            ->paginate(10)
        ]);
    }
}
