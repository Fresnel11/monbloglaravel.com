@extends('layouts.master')

@section('title')
    QUIZZ
@endsection

@section('contenu')
<div class="container">
    <h1>Liste des Quiz</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- @if ($quiz->isEmpty())
        <div class="alert alert-info">
            Aucun quiz disponible.
        </div>
    @else --}}
    <div class="container mt-5">
        {{-- <h1 class="mb-4">Question {{ $questionIndex + 1 }} sur 10</h1> --}}
        @foreach ($quizzes as $quiz)
        @if ($quiz->image)
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $quiz->image) }}" class="img-fluid" alt="quizzes Image">
            </div>
        @endif

        <form action="{{ route('quizzes.storeAnswer') }}" method="GET">
            @csrf
            <fieldset class="form-group">
                <legend>{{ $quiz->question }}</legend>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="trueAnswer" value="true" required>
                    <label class="form-check-label" for="trueAnswer">
                        Vrai
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="falseAnswer" value="false" required>
                    <label class="form-check-label" for="falseAnswer">
                        Faux
                    </label>
                </div>
            </fieldset>
            @endforeach

            <button type="submit" class="btn btn-primary">Suivant</button>
        </form>
    </div>
    
    
</div>
@endsection


