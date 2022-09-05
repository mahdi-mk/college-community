<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;

class GetTagQuestionsController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return response()->json([
            'questions' => Question::query()
                ->select('id', 'title', 'votes', 'author_id', 'created_at')
                ->with(['author', 'tags', 'authUserVote'])
                ->withCount('answers')
                ->whereHas('tags', function ($tags) use ($tag) {
                    $tags->where('tag_id', $tag->id);
                })
                ->paginate(10)
        ]);
    }
}
