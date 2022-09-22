<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return inertia('Auth/Profile', [
            'user' => $user,
            'questions' => $user->questions()->paginate(10),
            'answers' => $user->answers()->paginate(10),
        ]);
    }

    /**
     * Display a listing of user's questions.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function questions(User $user)
    {
        return inertia('Auth/Profile', [
            'user' => $user->loadCount('questions', 'answers'),
        ]);
    }

    /**
     * Display a listing of user's answers.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function answers(User $user)
    {
        //
    }
}
