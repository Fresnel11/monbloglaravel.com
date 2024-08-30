@extends('layouts.master')

@section('contenu')
    <div class="container mt-5">
        <h1 class="mb-4">Tableau de Bord</h1>
        <div class="alert alert-success" role="alert">
            Félicitations ! Vous avez terminé le quiz.
        </div>
        <p>Votre score est : <strong>{{ session('score', 0) }} / 10</strong></p>
        <a href="{{ route('quizzes.show') }}" class="btn btn-primary">Recommencer le quiz</a>

        <!-- Réinitialiser le score -->
        <?php session()->forget('score'); ?>
    </div>
@endsection
