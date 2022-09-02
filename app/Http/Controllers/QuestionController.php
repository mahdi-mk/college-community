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
        $questions = Question::query()
            ->select(['id', 'title', 'votes', 'created_at', 'author_id'])
            ->with(['tags:id,name', 'author:id,first_name,last_name'])
            ->withCount('answers')
            ->orderBy('id', 'desc')
            ->paginate(25);

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
        $question->load(['tags', 'author']);

        return inertia('Questions/Show', [
            'question' => $question
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
