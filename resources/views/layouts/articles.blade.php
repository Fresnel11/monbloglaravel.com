@extends('layouts.master')

@section('title')
    Article
@endsection

@section('contenu')
    <h2>Articles</h2>
    @forelse ($articles as $article)
        @include('layouts.articles.index')
    @empty
        @include('layouts.articles.no-articles')
    @endforelse
@endsection
