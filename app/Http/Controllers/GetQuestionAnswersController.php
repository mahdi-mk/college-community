<?php

namespace App\Http\Controllers;

use App\Models\Question;

class GetQuestionAnswersController extends Controller
{
    public function __invoke(Question $question)
    {
        return response()->json([
            'answers' => $question->answers()->with('author')->paginate(15)
        ]);
    }
}
