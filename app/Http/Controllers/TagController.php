<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return inertia('Tag/Show', [
            'tag' => $tag->loadCount('questions')->only('id', 'name', 'description', 'questions_count')
        ]);
    }
}
