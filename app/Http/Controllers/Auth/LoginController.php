<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
    // public function authenticate(Request $request): RedirectResponse 
    // 
        // $credential = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // if (Auth::attempt($credential)) {
        //     $request->session()->regenerate();
        //     return redirect()->route('articles.index');
        // }

        // return back()->withErrors([
        //     "email" => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    // }

// }
