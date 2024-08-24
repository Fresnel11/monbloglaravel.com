<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizzRequest;
use App\Http\Requests\UpdateQuizzRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiches toutes les ressources (articles)
     */
    public function index(Request $request)
    {

        // $quizzes = [
        //     ['title' => 'HTML', 'descripton' => 'L\'HTML est un langage de programmation.' ]
        // ];

        $quizzes = [
            ['title' => 'titre article 1', 'body' => 'Contenu de l\'article 1'],
            ['title' => 'titre article 2', 'body' => 'Contenu de l\'article 2'],
            ['title' => 'titre article 3', 'body' => 'Contenu de l\'article 3'],
        ];
        if (!Auth::user()) {
            return view('auth.register');
        }

        // $count = $request->input('count', 5); // Default to 5 if not provided
        // $quizzes = Quiz::inRandomOrder()->limit($count)->get();
        return view('layouts.quizzes', ['quizzes' => $quizzes]);
        
        // $articles = Quiz::latest()->paginate(5);
            
        
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'un quizz
     */
    public function create()
    {
        return view('quizzes.create');
    }

   

    /**
     * Store a newly created resource in storage.
     * Stock la ressource dans la BDD
     */
    public function store(StoreQuizzRequest $request)
    {
        $validated = $request->validated(); //récupère les donnés validées par le store
        // gerer la sauvegarde de le quizz (s'il y en a)
        if ($request->hasFile('image')) {
            $path = $request
            ->file('image')
            ->store('images', 'public');
            $validated['image'] = $path;
        }

        $validated['user_id'] = 1;
        // Envoyé le quizz dans la BDD
        Quiz::create($validated);

        // retourne sur la page des quizz 
        return redirect()->route('quizzes.index')
        ->with('success', 'Quizz créé avec succès !');
        // dd($validated);
    }

    /**
     * Display the specified resource.
     * Affiche une ressource spécifique
     */
    // public function show($id)
    // {
    //     // $article = Article::where("id", $id)->with("comments")->first();
    //     $article = Quiz::with('comments.user.articles')->find($id);
    //   return view('articles.show', ['article' => $article]);
    // }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire d'édition
     */
    public function edit(Quiz $quizzes)
    {
        return view('quizzes.edit', ['quizzes' => $quizzes]);
    }

    /**
     * Update the specified resource in storage.
     * Mettre à jour une ressource spécifique dans la base de donnée
     */
    public function update(UpdateQuizzRequest $request, Quiz $quizzes)
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
    public function destroy(Quiz $quizzes)
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
