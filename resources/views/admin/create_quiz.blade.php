@extends('layouts.master')
@section('contenu')
    <div class="container">
        <h1>Ajouter un nouveau quiz</h1>

        <form action="{{ route('quiz.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" name="question" class="form-control" id="question" required>
            </div>
            <div class="mb-3">
                <label for="correct_answer" class="form-label">Bonne réponse</label>
                <select name="correct_answer" class="form-control" id="correct_answer" required>
                    <option value="1">Vrai</option>
                    <option value="0">Faux</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="explanation" class="form-label">Explication (optionnel)</label>
                <textarea name="explanation" class="form-control" id="explanation"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le quiz</button>
        </form>
    </div>
@endsection