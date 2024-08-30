<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashbord");
    }

    public function totalUsers()
    {
        $totalUsers = User::count();
        return view("admin.dashbord", compact("totalUsers"));
    }
}
