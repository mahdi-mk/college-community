<?php

use App\Http\Controllers\FindTagsController;
use App\Http\Controllers\GetQuestionAnswersController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostAnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('home');

Route::get('tags/find', FindTagsController::class)->name('tags.find');

//---------------------------------------------------------------------
// Routes for questions
//---------------------------------------------------------------------
Route::resource('questions', QuestionController::class);

Route::post('/answers/post', PostAnswerController::class)->name('answers.post');

Route::get('/questions/{question}/answers', GetQuestionAnswersController::class)->name('questions.answers');
