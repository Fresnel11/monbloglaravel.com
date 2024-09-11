@extends('layouts.master')

@section('contenu')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}

    @if (session('score') < 5)
        <x-bladewind::alert type="error">
            Oh non ! Votre score est de <strong>{{ session('score') }} /10</strong>. Ne vous découragez pas, essayez à
            nouveau !
            <hr>
            <p>Continuez à vous entraîner, vous ferez mieux la prochaine fois.</p>
        </x-bladewind::alert>
    @else
        <x-bladewind::alert type="success">
            Félicitations ! Vous avez complété le quiz avec un score de <strong>{{ session('score') }} /10</strong> !
            <hr>
            <p>Continuez à vous entraîner pour obtenir un score encore meilleur !</p>
        </x-bladewind::alert>
    @endif

    
@endsection
