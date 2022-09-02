<?php

use App\Http\Controllers\FindTagsController;
use App\Http\Controllers\GetQuestionsAnswersController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostAnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('home');

Route::get('tags/find', FindTagsController::class)->name('tags.find');

Route::resource('questions', QuestionController::class);

Route::post('/answers/post', PostAnswerController::class)->name('answers.post');

Route::get('/questions/{question}/answers', GetQuestionsAnswersController::class)->name('questions.answers');
