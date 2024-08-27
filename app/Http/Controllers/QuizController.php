<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizzRequest;
use App\Http\Requests\UpdateQuizzRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Quizzes;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiches toutes les ressources (articles)
     */
    public function index(Request $request)
    {
        if (!Auth::user()) {
            return view('auth.register');
        }
        // Sélectionne 10 Quizz a afficher de manière aléatoire 
        $quizzes = Quizzes::all();
        return view('quizzes.index', compact('quizzes'));
        // return view('layouts.quizzes', ['quizzes' => $quizzes]);
        
        // $articles = Quiz::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'un quizz
     */
    public function create()
    {
        $quizzes = Quizzes::all();
        return view('quizzes.create', compact('quizzes'));

    }

   

    /**
     * Store a newly created resource in storage.
     * Stock la ressource dans la BDD
     */
    public function store(StoreQuizzRequest $request)
    {
        $quiz = new Quizzes();
        $quiz->question = $request->input('question');
        $quiz->correct_answer = $request->input('correct_answer');
        $quiz->explanation = $request->input('explanation', '');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $quiz->image = $imagePath;
        }

        $quiz->save();

        return redirect()->route('quizzes.create')->with('success', 'Quiz ajouté avec succès.');
        
    }

    /**
     * Display the specified resource.
     * Affiche une ressource spécifique
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire d'édition
     */
    public function edit($id)
    {
        // Trouver le quiz par ID
        $quizzes = Quizzes::findOrFail($id);
    
        // Retourner la vue d'édition avec les quizzes
        return view('quizzes.create', compact('quizzes'));
    }
    

    /**
     * Update the specified resource in storage.
     * Mettre à jour une ressource spécifique dans la base de donnée
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'question' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'correct_answer' => 'required|string|max:255',
        'explanation' => 'nullable|string',
    ]);

    // Trouver le quiz par ID
    $quizzes = Quizzes::findOrFail($id);

    // Mettre à jour les champs du quiz
    $quizzes->question = $validated['question'];
    $quizzes->correct_answer = $validated['correct_answer'];
    $quizzes->explanation = $validated['explanation'];

    // Gérer le fichier image si un nouveau fichier est téléchargé
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($quizzes->image) {
            Storage::delete('public/' . $quizzes->image);
        }

        // Stocker la nouvelle image
        $imagePath = $request->file('image')->store('images', 'public');
        $quizzes->image = $imagePath;
    }

    // Sauvegarder les changements dans la base de données
    $quizzes->save();

    // Rediriger avec un message de succès
    return redirect()->route('quizzes.index')->with('success', 'Quiz mis à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quiz = Quizzes::findOrFail($id);

        if ($quiz->image) {
            \Storage::delete('public/' . $quiz->image);
        }
        
        // Supprimer le quizz de la BDD
        $quiz->delete();
        
        return redirect()->route('quizzes.create')->with('success', 'Quizz supprimé avec succès !');
    }
}