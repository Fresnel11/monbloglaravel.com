@extends('layouts.master')

@section('title')
    Article
@endsection

@section('contenu')
    <h2>Articles</h2>
    <p>
        <a href="/article/create" class="btn btn-primary">Créer un article</a>
    </p>
    @forelse ($articles as $article)
        @include('articles.partials.index')
    @empty
        @include('articles.partials.no-articles')
    @endforelse
@endsection
 