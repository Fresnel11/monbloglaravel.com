@extends('layouts.master')

@section('contenu')
    <div class="container ">
        <div class="d-flex justify-content-center ">
            <div class="card " style="max-width: 1000px; width: 300%;">
                <div class="card-body">
                    <h5 class="card-title text-center">Mon Profil</h5>
                    <p class="card-text"><strong>ID :</strong> {{ Auth::user()->id }}</p>
                    <p class="card-text"><strong>Nom :</strong> {{ Auth::user()->name }}</p>
                    <p class="card-text"><strong>Email :</strong> {{ Auth::user()->email }}</p>
                    <div class="d-flex justify-content-center mt-3">
                        <button id="upButon" class="btn btn-primary me-2">Modifier le profil</button>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Supprimer le compte</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="update">

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

                                                <h2>Modifier votre profil</h2>

                                            </div>
                                            {{-- <h4 class="text-center">Bienvenue sur code quizz !</h4> --}}
                                        </div>
                                    </div>
                                </div>
                                <form  method="POST" action="{{ route('user.update') }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="name" placeholder="Nouveau nom" required>
                                                <label for="email" class="form-label">Nouveau nom</label>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    id="email" placeholder="Nouvelle adresse-mail" required>
                                                <label for="email" class="form-label">Nouvelle adresse-mail</label>
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
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="password" placeholder="Nouveau mot de passe"
                                                    required>
                                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" id="password_confirmation"
                                                    placeholder="Confirmer le nouveau mot de passe" required>
                                                <label for="password_confirmation" class="form-label">Confirmer le nouveau
                                                    mot de
                                                    passe</label>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button id="creer" class="btn bsb-btn-xl btn-primary"
                                                    type="submit">Modifier le profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Etes vous sûr de vouloir supprimé le compte ?
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Mot de passe</label>
                            <input required="" type="password" class="form-control"
                                placeholder="Confirmez votre mot de passe pour la suppression" id="recipient-name">
                        </div>
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                        {{-- <div class="mb-3">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger">Supprimer le compte</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let formUpdate = document.getElementById('update');
        formUpdate.style.display = 'none';
        document.getElementById('upButon').addEventListener('click', function() {
            if (formUpdate.style.display === 'none') {
                formUpdate.style.display = 'block'
            } else {
                formUpdate.style.display = 'none'
            }
        })
    </script>
@endsection




