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

    @if ($quizzes->isEmpty())
        <div class="alert alert-info">
            Aucun quiz disponible.
        </div>
    @else
        <div class="row">
            @foreach ($quizzes as $quiz)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($quiz->image)
                            <img src="{{ asset('storage/' . $quiz->image) }}" class="card-img-top" alt="Image du quiz">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $quiz->question }}</h5>

                            <form action="{{ route('quizzes.check', ['id' => $quiz->id]) }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <button type="submit" name="answer" value="true" class="btn btn-success">Vrai</button>
                                    <button type="submit" name="answer" value="false" class="btn btn-danger">Faux</button>
                                </div>
                            </form>

                            @if (session('result') && session('quiz_id') === $quiz->id)
                                <div class="mt-3 alert {{ session('result') ? 'alert-success' : 'alert-danger' }}">
                                    {{ session('result') ? 'Bonne réponse!' : 'Mauvaise réponse. ' . $quiz->explanation }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection


