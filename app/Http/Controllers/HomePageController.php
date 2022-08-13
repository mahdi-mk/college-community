<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __invoke()
    {
        $topQuestions = Question::query()
            ->paginate(20);

        return inertia('Home', [
            'topQuestions' => $topQuestions
        ]);
    }
}
