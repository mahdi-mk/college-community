<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\PostAnswer;
use App\Models\Answer;

class PostAnswerController extends Controller
{
    public function __invoke(PostAnswer $request)
    {
        Answer::create($request->validated() + ['author_id' => auth()->id()]);

        return redirect()->back();       
    }
}
