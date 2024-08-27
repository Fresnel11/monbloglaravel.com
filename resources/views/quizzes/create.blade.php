@extends('layouts.master')

@section('title')
    Créer un article
@endsection

@section('contenu')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1>Ajouter un nouveau quiz</h1>

    <form action="{{ route('quizzes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>
        <div class="form-group">
            <label for="image">Image (optionnelle)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="correct_answer">Réponse correcte</label>
            <select class="form-control" id="correct_answer" name="correct_answer">
                <option value="1">Vrai</option>
                <option value="0">Faux</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="explanation" class="form-label">Explication (optionnel)</label>
            <textarea name="explanation" class="form-control" id="explanation"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">question</th>
        <th scope="col">Image(url)</th>
        <th scope="col">correct_answer</th>
        <th scope="col">explanation</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
       @if(true)
        @foreach($quizzes as $quizze)
      <tr>
        <th scope="row">{{ $quizze->id }}</th>
        <td>{{ $quizze->question }}</td>
        <td>{{ $quizze->image }}</td>
        <td>{{ $quizze->correct_answer }}</td>
        <td>{{ $quizze->explanation }}</td>
        <td>
            <a href="{{ route('quizzes.edit', $quizze->id) }}" class="btn btn-warning btn-sm">Modifier</a>
            <form action="{{ route('quizzes.destroy', $quizze->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>
        </td>
      </tr>
      @endforeach
     @endif
    </tbody>
  </table>
@endsection
