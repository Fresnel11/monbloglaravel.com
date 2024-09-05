<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScoreController extends Controller
{
    public function index()
    {
        $score = Session::get('score', 0);
        return view('quizzes.dashboard', compact('score'));
    }
}
