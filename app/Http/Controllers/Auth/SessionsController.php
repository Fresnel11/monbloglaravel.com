<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SessionsController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('quizzes.index');
        }

        return back()->withErrors([
            'email' => 'Vos identifiants sont incorrect',
        ])->onlyInput('email');
    }

    // public function authenticate (Request $request) {
    //     $user = User::where('email', $request["email"])->firstorFail();
    //     Auth::login($user);
    //     return redirect()->route('articles.index')
    //     ->with('success', 'Connexion Reussie!');
    // }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('logout')
            ->with('success', 'Vous êtes déconnecté !');
    }

    public function editProfile()
    {
        Auth::editProfile();
        return view();
    }
}
