@extends('layouts.master')

@section('contenu')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center">Modifié vos informations</h3>
        <form action="{{ route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" 
                class="form-label">Nom</label>
                <input 
                type="name"
                class="form-control"
                id="name"
                name="name"
                value="{{ Auth::user()->name }}">
                
            </div>
            <div class="mb-3">
                <label for="email" 
                class="form-label">Adresse Mail</label>
                <input 
                type="email"
                class="form-control"
                id="email"
                name="email"
                readonly
                value="{{ Auth::user()->email }}">
            </div>
            {{-- <div class="mb-3">
                <label for="password" 
                class="form-label">Mot de passe</label>
                <input 
                type="password"
                class="form-control"
                id="password"
                name="password"
                value="{{ Auth::user()->password }}">
            </div> --}}
            <button type="submit" class="btn btn-primary w-100" >
                Modifié vos informations
            </button>
        </form>
    </div>
@endsection
