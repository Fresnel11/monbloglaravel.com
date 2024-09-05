@extends('layouts.master')

@section('contenu')
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

                                        <h2>Modififer le Quiz</h2>

                                    </div>
                                    {{-- <h4 class="text-center">Bienvenue sur code quizz !</h4> --}}
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('quizzes.update', $quizzes->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row gy-3 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="question" id="question"
                                            value="{{ old('question', $quizzes->question) }}" required>
                                        <label for="question" class="form-label">Question</label>
                                        @error('question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" name="image" id="image"
                                            value="">
                                        <label for="image" class="form-label">Image</label>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @if ($quizzes->image)
                                            <img src="{{ asset('storage/' . $quizzes->image) }}" alt="Image"
                                                style="width: 100px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="correct_answer" id="correct_answer"
                                            class="form-control"
                                            value="{{ old('correct_answer', $quizzes->correct_answer) }}" required>
                                        <label for="correct_answer" class="form-label">Réponse correct</label>
                                        @error('correct_answer')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <div class="mb-3">
                                                <label for="explanation" class="form-label">Explication
                                                    (optionnel)</label>
                                                <textarea name="explanation" class="form-control" id="explanation">{{ old('explanation', $quizzes->explanation) }}</textarea>
                                                @error('explanation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button id="creer" class="btn bsb-btn-xl btn-primary" type="submit">Mettre à Jour le Quiz</button>
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
@endsection


