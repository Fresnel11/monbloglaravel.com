<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdatearticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiches toutes les ressources (articles)
     */
    public function index()
    {
        if (!Auth::user()) {
            return view('auth.register');
        }
        // $articles = Article::orderByDesc('created_at')->get();
        $articles = Article::latest()->paginate(5);
            
        return view('layouts.articles', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'un article
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * Stock la ressource dans la BDD
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated(); //récupère les donnés validées par le store
        // gerer la sauvegarde de l'article (s'il y en a)
        if ($request->hasFile('image')) {
            $path = $request
            ->file('image')
            ->store('images', 'public');
            $validated['image'] = $path;
        }

        $validated['user_id'] = 1;
        // Envoyé l'article dans la BDD
        Article::create($validated);

        // retourne sur la page des articles 
        return redirect()->route('articles.index')
        ->with('success', 'Article créé avec succès !');
        // dd($validated);
    }

    /**
     * Display the specified resource.
     * Affiche une ressource spécifique
     */
    public function show($id)
    {
        // $article = Article::where("id", $id)->with("comments")->first();
        $article = Article::with('comments.user.articles')->find($id);
      return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire d'édition
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     * Mettre à jour une ressource spécifique dans la base de donnée
     */
    public function update(UpdatearticleRequest $request, Article $article)
    {
        // Les données validées sont déjà disponible
        // via le UpdatearticleRequest
        $validated = $request->validated();

        // Gestiion de l'image

        if ($request->hasFile('image')){
            Storage::disk("public")->delete($article->image);
            // Si on a une image 
            // Supprimer l'ancienne image si elle existe
            // Stocker la nouvelle image
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }else{
            // Garde l'image existante si aucune nouvelle 
            // image n'est téléchargé
            $validated['image'] = $article->image;
        }

        $article->update($validated);
        return redirect()->route('articles.show' , $article->id)->with('success', 'Article modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        // Supprimer l'article de la BDD
        $article->delete();
        // Rediriger vers la liste des articles
        // avec un message de succès !
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès !');
    }
}
