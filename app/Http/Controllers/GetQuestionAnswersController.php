<?php

namespace App\Http\Controllers;

use App\Models\Question;

class GetQuestionAnswersController extends Controller
{
    public function __invoke(Question $question)
    {
        return response()->json([
            'answers' => $question->answers()->with(['author', 'authUserVote:id,answer_id,type'])->paginate(10)
        ]);
    }
}
