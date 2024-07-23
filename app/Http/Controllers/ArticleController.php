<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiches toutes les ressources (articles)
     */
    public function index()
    {
        $articles = Article::all();
            
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
            ->store('/images');
            $validated['image'] = $path;
        }
        // Envoyé l'article dans la BDD
        Article::create($validated);

        // retourne sur la page des articles 
        return redirect('/articles')->with('sucess', 'Article créé avec succès !');
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
        //
    }

    /**
     * Update the specified resource in storage.
     * Mettre à jour une ressource spécifique dans la base de donnée
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
