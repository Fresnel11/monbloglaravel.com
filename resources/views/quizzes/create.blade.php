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
        <th scope="row">{{ $quizze['id'] }}</th>
        <td>{{ $quizze['question'] }}</td>
        <td>{{ $quizze['image'] }}</td>
        <td>{{ $quizze['correct_answer'] }}</td>
        <td>{{ $quizze['explanation'] }}</td>
        <td>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F71212" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0d6efd" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg>
        </td>
      </tr>
      @endforeach
     @endif
    </tbody>
  </table>
@endsection
