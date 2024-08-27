@extends('layouts.master')

@section('contenu')
<div class="container">
    <h1>Modifier le Quiz</h1>

    <form action="{{ route('quizzes.update', $quizzes->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" name="question" id="question" class="form-control" value="{{ old('question', $quizzes->question) }}" required>
            @error('question')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @if($quizzes->image)
                <img src="{{ asset('storage/' . $quizzes->image) }}" alt="Image" style="width: 100px; margin-top: 10px;">
            @endif
        </div>

        <div class="form-group">
            <label for="correct_answer">Réponse Correcte</label>
            <input type="text" name="correct_answer" id="correct_answer" class="form-control" value="{{ old('correct_answer', $quizzes->correct_answer) }}" required>
            @error('correct_answer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="explanation">Explication (Optionnelle)</label>
            <textarea name="explanation" id="explanation" class="form-control">{{ old('explanation', $quizzes->explanation) }}</textarea>
            @error('explanation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour le Quiz</button>
    </form>
</div>
@endsection
