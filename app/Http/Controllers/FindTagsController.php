<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class FindTagsController extends Controller
{
    public function __invoke()
    {
        $search = request()->get('search');

        $tags = Tag::query()
            ->select(['id', 'name as text'])
            ->where('name', 'like', "%{$search}%")
            ->simplePaginate(15);

        return response()->json([
            'items' => $tags,
            'pagination' => [
                'more' => $tags->nextPageUrl() !== null
            ] 
        ]);
    }
}
