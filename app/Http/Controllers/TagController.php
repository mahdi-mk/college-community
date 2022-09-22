<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return inertia('Tag/Show', [
            'tag' => $tag->only(['id', 'name', 'description']),
            'questions' => $tag->questions()
                ->with('author', 'tags')
                ->withCount('answers')
                ->paginate(20)
        ]);
    }
}
