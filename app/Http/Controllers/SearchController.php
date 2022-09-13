<?php

namespace App\Http\Controllers;

use App\Models\Question;

class SearchController extends Controller
{
    public function __invoke(string $keyword)
    {
        $questions = Question::query()
            ->select('id', 'title')
            ->where('title', 'Like', '%' . $keyword . '%')
            ->orWhereHas('tags', function ($tags) use ($keyword) {
                $tags->where('name', 'Like', '%' . $keyword . '%');
            })
            ->simplePaginate(9);

        return response()->json([
            'questions' => $questions,
            'hasMore' => $questions->hasPages()
        ]);
    }
}
