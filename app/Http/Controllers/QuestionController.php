<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreQuestion;
use App\Http\Requests\Question\UpdateQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    public function __construct() 
    {
        // $this->middleware('auth')->except('index', 'show');
    }

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
        $this->authorize('create', Question::class);

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
            'answers' => $answers,
            'can' => [
                'delete' => Gate::allows('delete', $question),
                'update' => Gate::allows('update', $question)
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        return inertia('Questions/Edit', [
            'question' => $question->load('tags:id,name')->only([
                'id', 'title', 'content', 'created_at', 'tags'
            ]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateQuestion  $request
     * @param  Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestion $request, Question $question)
    {
        $question->update($request->only('title', 'content'));

        $question->tags()->sync($request->tags);

        return redirect()->route('questions.show', $question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();

        return redirect()->route('questions.index');
    }
}
