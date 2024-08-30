@extends('layouts.master')

@section('title', 'Register')

@section('contenu')
<section class=" p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card border border-light-subtle rounded-4">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <div class="text-center mb-4">

                                        <h2>S'inscrire</h2>

                                    </div>
                                    <h4 class="text-center">Bienvenue sur code quizz !</h4>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="row gy-3 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                            name="nom" id="nom" placeholder="Nom" required>
                                        <label for="email" class="form-label">Nom</label>
                                        @error('nom')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="name@example.com" required>
                                        <label for="email" class="form-label">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password" value="" placeholder="Password" required>
                                        <label for="password" class="form-label">Mot de passe</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="confirm_password"
                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                            name="confirm_password" id="confirm_password" value=""
                                            placeholder="Confirmer le mot de passe" required>
                                        <label for="confirm_password" class="form-label">Confirmer le mot de
                                            passe</label>
                                        @error('confirm_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button id="creer" class="btn bsb-btn-xl btn-primary"
                                            type="submit">Créer un compte</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                    <a href="{{ route('register') }}"
                                        class="link-secondary text-decoration-none">Créer un compte</a>
                                    {{-- <a href="#!" class="link-secondary text-decoration-none">Forgot password</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            #creer {
                background-color: #018673;
                border: none;
            }
        </style>
</section>

@endsection


