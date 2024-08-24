@extends('layouts.master')

@section('title')
    QUIZZ CODE 
@endsection

@section('contenu')
    <h2>QUIZZS</h2>
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif --}}
    {{-- <p>
        <a href="/article/create" class="btn btn-primary">Créer un article</a>
    </p> --}}
    @forelse ($quizzes as $quizze)
        @include('quizzes.partials.index')
     
    @empty
        @include('quizzes.partials.no-quizz')
    @endforelse
       {{-- Liens de Pagination --}}
       <div class="d-flex justify-content-center">
        {{-- {{$quizzes->links()}} --}}
    </div>
@endsection
 