@extends('layouts.master')

{{-- @section('title', 'Register') --}}

@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center">Contactez-nous</h3>
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="nom"
                        name="nom" value="{{ old('nom') }}">
                    @error('nom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control @error('body') is-invalid @enderror" placeholder="Entrez le contenu de l'article"
                        name="body" style="height: 300px" id="body">{{ old('body') }}</textarea>
                    <label for="body">Corps de l'article</label>
                    {{-- Message d'erreur pour le body --}}
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    Envoyer
                </button>
            </form>
        </div>
    </div>
@endsection
