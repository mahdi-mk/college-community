<?php

use App\Http\Controllers\AnswerVotingController;
use App\Http\Controllers\FindTagsController;
use App\Http\Controllers\GetTagQuestionsController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostAnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionVotingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('home');

/** Questions Routes */
Route::resource('questions', QuestionController::class);

/** Question Voting Routes */
Route::post('questions/{question}/upvote/toggle', [QuestionVotingController::class, 'upvote'])->name('questions.upvote');
Route::post('questions/{question}/downvote/toggle', [QuestionVotingController::class, 'downvote'])->name('questions.downvote');

/** Answer Voting Routes */
Route::post('answers/{answer}/upvote/toggle', [AnswerVotingController::class, 'upvote'])->name('answers.upvote');
Route::post('answers/{answer}/downvote/toggle', [AnswerVotingController::class, 'downvote'])->name('answers.downvote');

/** Answers Routes */
Route::post('/answers/post', PostAnswerController::class)->name('answers.post');

/** Tags Routes */
Route::prefix('tags')->name('tags.')->group(function () {
  Route::get('find', FindTagsController::class)->name('find');
  Route::get('{tag}', [TagController::class, 'show'])->name('show');
});

/** Search Route */
Route::get('search/{keyword}', SearchController::class)->name('search');

Route::prefix('/u/{user}')->name('profile.')->group(function () {
  Route::get('/', [ProfileController::class, 'index'])->name('index');
  Route::get('/questions', [ProfileController::class, 'questions'])->name('questions');
  Route::get('/answers', [ProfileController::class, 'answers'])->name('answers');
});