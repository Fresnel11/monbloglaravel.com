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
        $quizzes = Quizzes::inRandomOrder()->limit(10)->get();
        return view('quizzes.partials.index', compact('quizzes'));
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
        $validated = $request->validated();

        quizzes::create([
            'question' => $validated['question'],
            'image' => $validated['image'],
            'correct_answer' => $validated['correct_answer'],
            'explanation' => $validated['explanation'],
            
        ]);

        // retourne sur la page des quizz 
        return redirect()->route('quizzes.index')
        ->with('success', 'Quizz créé avec succès !');
        
    }

    /**
     * Display the specified resource.
     * Affiche une ressource spécifique
     */
    public function show($id)
    {
        // $quizzes = Quizzes::where("id", $id)->first();
        // // $article = Quizzes::with('comments.user.articles')->find($id);
        // return view('quizzes.show', compact('quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire d'édition
     */
    public function edit(Quizzes $quizzes)
    {
        return view('quizzes.edit', ['quizzes' => $quizzes]);
    }

    /**
     * Update the specified resource in storage.
     * Mettre à jour une ressource spécifique dans la base de donnée
     */
    public function update(UpdateQuizzRequest $request, Quizzes $quizzes)
    {
        // Les données validées sont déjà disponible
        // via le UpdateQuizzRequest
        $validated = $request->validated();

        // Gestiion de l'image

        if ($request->hasFile('image')){
            Storage::disk("public")->delete($quizzes->image);
            // Si on a une image 
            // Supprimer l'ancienne image si elle existe
            // Stocker la nouvelle image
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }else{
            // Garde l'image existante si aucune nouvelle 
            // image n'est téléchargé
            $validated['image'] = $quizzes->image;
        }

        $quizzes->update($validated);
        return redirect()->route('quizzes.show' , $quizzes->id)->with('success', 'Quizz modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quizzes $quizzes)
    {
        if ($quizzes->image) {
            Storage::disk('public')->delete($quizzes->image);
        }
        // Supprimer le quizz de la BDD
        $quizzes->delete();
        // Rediriger vers la liste des quizz
        // avec un message de succès !
        return redirect()->route('quizzes.index')->with('success', 'Quizz supprimé avec succès !');
    }
}
