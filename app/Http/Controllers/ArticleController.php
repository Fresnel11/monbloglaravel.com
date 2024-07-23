<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     * Stock la ressource dans la BDD
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Affiche une ressource spécifique
     */
    public function show($id)
    {
        $article = Article::where("id", $id)->with("comments")->first();
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
