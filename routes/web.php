<?php

use App\Http\Controllers\AnswerVotingController;
use App\Http\Controllers\FindTagsController;
use App\Http\Controllers\GetQuestionAnswersController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostAnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionVoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
  /** Question Voting Routes */
  Route::post('questions/{question}/upvote/toggle', [QuestionVoteController::class, 'upvote'])->name('questions.upvote');
  Route::post('questions/{question}/downvote/toggle', [QuestionVoteController::class, 'downvote'])->name('questions.downvote');

  /** Answer Voting Routes */
  Route::post('answers/{answer}/upvote/toggle', [AnswerVotingController::class, 'upvote'])->name('answers.upvote');
  Route::post('answers/{answer}/downvote/toggle', [AnswerVotingController::class, 'downvote'])->name('answers.downvote');
});


Route::get('/', HomePageController::class)->name('home');

Route::get('tags/find', FindTagsController::class)->name('tags.find');

/** begin: Questions Routes */
Route::resource('questions', QuestionController::class);
/** end: Questions Routes */

Route::post('/answers/post', PostAnswerController::class)->name('answers.post');

Route::get('/questions/{question}/answers', GetQuestionAnswersController::class)->name('questions.answers');
