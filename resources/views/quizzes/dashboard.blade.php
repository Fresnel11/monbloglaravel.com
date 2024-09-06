@extends('layouts.master')

@section('contenu')
@if(session('score') < 5)
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        <h4 class="alert-heading">Oh non !</h4>
        <p>Votre score est de <strong>{{ session('score') }} /10</strong>. Ne vous découragez pas, essayez à nouveau !</p>
        <hr>
        <p class="mb-0">Continuez à vous entraîner, vous ferez mieux la prochaine fois.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@else
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <h4 class="alert-heading">Félicitations !</h4>
        <p>Vous avez complété le quiz avec un score de <strong>{{ session('score') }} /10</strong> !</p>
        <hr>
        <p class="mb-0">Continuez à vous entraîner pour obtenir un score encore meilleur !</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@endsection
