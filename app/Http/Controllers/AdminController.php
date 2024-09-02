<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashbord");
    }

    public function stats(Request $request)
    {
        $totalQuizzes = Quizzes::count();
        $totalUsers = User::count();
        
        

        return view('admin.dashboard', compact('totalQuizzes', 'totalUsers'));
    }
}
