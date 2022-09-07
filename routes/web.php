<?php

use App\Http\Controllers\AnswerVotingController;
use App\Http\Controllers\FindTagsController;
use App\Http\Controllers\GetQuestionAnswersController;
use App\Http\Controllers\GetTagQuestionsController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostAnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionVotingController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('home');

Route::middleware('auth')->group(function () {
  /** Question Voting Routes */
  Route::post('questions/{question}/upvote/toggle', [QuestionVotingController::class, 'upvote'])->name('questions.upvote');
  Route::post('questions/{question}/downvote/toggle', [QuestionVotingController::class, 'downvote'])->name('questions.downvote');

  /** Answer Voting Routes */
  Route::post('answers/{answer}/upvote/toggle', [AnswerVotingController::class, 'upvote'])->name('answers.upvote');
  Route::post('answers/{answer}/downvote/toggle', [AnswerVotingController::class, 'downvote'])->name('answers.downvote');

  /** Question CRUD Routes */
  Route::resource('questions', QuestionController::class, ['except' => ['index', 'show']]);
});

/** Questions Routes */
Route::get('questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('questions/{question}/answers', GetQuestionAnswersController::class)->name('questions.answers');

/** Tags Routes */
Route::prefix('tags')->name('tags.')->group(function () {
  Route::get('{tag}', [TagController::class, 'show'])->name('show');
  Route::get('find', FindTagsController::class)->name('find');
  Route::get('{tag}/questions', GetTagQuestionsController::class)->name('questions');
});

/** Answers Routes */
Route::post('/answers/post', PostAnswerController::class)->name('answers.post');