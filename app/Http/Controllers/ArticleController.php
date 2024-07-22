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
        $articles = [
            [
                "title" => "Titre article 1",
                "body" => "Contenu de l'article 1"
            ],
            [
                "title" => "Titre article 2",
                "body" => "Contenu de l'article 2"
            ],
            [
                "title" => "Titre article 3",
                "body" => "Contenu de l'article 3"
            ],
            ];
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
    public function show(Article $article)
    {
        //
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
