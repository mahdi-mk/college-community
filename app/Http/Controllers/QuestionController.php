<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = request()->query('filter', 'latest');

        if (! in_array($filter, ['latest', 'popular-this-week', 'popular-all-time', 'solved', 'unsolved', 'no-answers'])) {
            $filter = 'latest';
        }

        $questions = Question::query()
            ->select(['id', 'title', 'votes', 'created_at', 'author_id'])
            ->with(['tags:id,name', 'author:id,first_name,last_name'])
            ->withCount('answers')
            ->applyFilters($filter)
            ->paginate(15)
            ->appends(request()->query());

        return inertia('Questions/Index', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Questions/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreQuestion  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion $request)
    {
        $question = Question::create($request->only('title', 'content') + ['author_id' => auth()->id()]);

        $question->tags()->sync($request->tags);

        return redirect()->route('questions.show', $question);
    }

    /**
     * Display the specified resource.
     *
     * @param  Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->load([
            'tags:id,name',
            'author:id,first_name,last_name',
            'authUserVote'
        ]);

        $answers = $question->answers()
            ->with([
                'author:id,first_name,last_name',
                'authUserVote:id,answer_id,type'
            ])
            ->select('id', 'author_id', 'content', 'votes', 'created_at')
            ->paginate(15);

        return inertia('Questions/Show', [
            'question' => $question,
            'answers' => $answers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
