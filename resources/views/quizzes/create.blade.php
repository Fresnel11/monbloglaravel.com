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
        <section class=" p-3 p-md-4 p-xl-5" id="formadd">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="card border border-light-subtle rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <div class="text-center mb-4">

                                                <h2>Ajouter un nouveau quizz</h2>

                                            </div>
                                            {{-- <h4 class="text-center">Bienvenue sur code quizz !</h4> --}}
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('quizzes.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="question" id="question"
                                                    placeholder="name@example.com" required>
                                                <label for="question" class="form-label">Question</label>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" name="image" id="image"
                                                    value="" required>
                                                <label for="image" class="form-label">Image</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="correct_answer" name="correct_answer">
                                                    <option value="1">Vrai</option>
                                                    <option value="0">Faux</option>
                                                </select>
                                                <label for="image" class="form-label">Réponse correct</label>

                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <div class="mb-3">
                                                        <label for="explanation" class="form-label">Explication
                                                            (optionnel)</label>
                                                        <textarea name="explanation" class="form-control" id="explanation"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button id="creer" class="btn bsb-btn-xl btn-primary"
                                                    type="submit">Ajouter +</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                            {{-- <a href="{{ route('register') }}"  class="link-secondary text-decoration-none">Créer un compte</a> --}}
                                            {{-- <a href="#!" class="link-secondary text-decoration-none">Forgot password</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <style>
            #creer {
                background-color: #018673;
                border: none;
            }
        </style>
    </div>
   
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Quizz Liste <span class="text-muted fw-normal ms-2"></span></h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                   
                    <div>
                        <a id="toggle-form" href="#" data-bs-toggle="modal" data-bs-target=".add-new" class="btn btn-primary"><i
                                class="bx bx-plus me-1"></i> Add New</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    {{-- <th scope="col" class="ps-4" style="width: 50px;">
                                        <div class="form-check font-size-16"><input type="checkbox" class="form-check-input" id="contacusercheck" /><label class="form-check-label" for="contacusercheck"></label></div>
                                    </th> --}}
                                    <th scope="col">Id</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Image(url)</th>
                                    <th scope="col">Réponse correcte</th>
                                    <th scope="col">Explanation</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (true)
                                    @foreach ($quizzes as $quizze)
                                        <tr>
                                            {{-- <th scope="row" class="ps-4">
                                        <div class="form-check font-size-16"><input type="checkbox" class="form-check-input" id="contacusercheck1" /><label class="form-check-label" for="contacusercheck1"></label></div>
                                    </th> --}}
                                            <td>{{ $quizze['id'] }}</td>
                                            <td>
                                                   {{ $quizze['question'] }}
                                            </td>
                                            <td>{{ $quizze['image'] }}</td>
                                            <td>{{ $quizze['correct_answer'] }}</td>
                                            <td>{{ $quizze['explanation'] }}</td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('quizzes.edit', $quizze->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit" class="px-2 text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                              </svg></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        
                                                            <form action="{{ route('quizzes.destroy', $quizze->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input class="btn btn-sm btn-danger ml-3" type="submit" value="Supprimer">
                                                            </form>
                                                       
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <script>
        let form1 = document.getElementById('formadd').style.display = 'none';
        document.getElementById('toggle-form').addEventListener('click', function() {
            let form = document.getElementById('formadd');
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        });
    </script>
@endsection





