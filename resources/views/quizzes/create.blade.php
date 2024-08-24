@extends('layouts.master')

@section('title')
    Créer un article
@endsection

@section('contenu')
    <form method="POST" action="{{route('quizzes.store')}}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        {{-- Cross Site Ressource Forgery --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titre de l'article</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                aria-describedby="emailHelp" value="{{old('title')}}">
            {{-- Message d'erreur pour le titre --}}
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 form-floating">
            <textarea class="form-control @error('body') is-invalid @enderror" placeholder="Entrez le contenu de l'article"
                name="body" style="height: 300px" id="body">{{old('body')}}</textarea>
            <label for="body">Corps de l'article</label>
            {{-- Message d'erreur pour le body --}}
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <label for="image">Choisir une image pour l'article</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection
