<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        $validated = $request->validated();
        
        // creér le nouvel utilisateur
        User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => bcrypt($validated["password"]),
        ]);
        // Connecter l'utilisateur
        $user = User::where('email', $validated["email"])->firstorFail();
        Auth::login($user);
        // rediriger l'utilisateur
        return redirect()->route('quizzes.index');
        // dd($validated);
    }
}
