@extends('layouts.master')

@section('title')
    Article
@endsection

@section('contenu')
    <h2>Articles</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <p>
        <a href="/article/create" class="btn btn-primary">Créer un article</a>
    </p>
    @forelse ($articles as $article)
        @include('articles.partials.index')
     
    @empty
        @include('articles.partials.no-articles')
    @endforelse
       {{-- Liens de Pagination --}}
       <div class="d-flex justify-content-center">
        {{$articles->links()}}
    </div>
@endsection
 