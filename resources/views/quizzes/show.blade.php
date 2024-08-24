@extends('layouts.master')
@section('contenu')
    <article class="card mb-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($article->image)
            <img src="{{ asset('storage/' .  $quizzes->image) }}" alt="" class="card-img-top">
        @endif
        <div class="card-body">
            <h2 class="card-title">
                {{  $quizzes['title'] }}
                <a class="btn btn-sm btn-warning ml-3" href="/articles/{{  $quizzes->id }}/edit">Modifié l'article</a>
                <form action="{{ route('quizzes.destroy',  $quizzes->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-3">Supprimé l'article</button>
                </form>
            </h2>
            {{-- <small>Auteur : <strong>{{$article->user->name}}</strong>créé le {{$article->created_at->todateString()}} </small> --}}
            <p class="card-text ">{{ $quizzes['body'] }}</p>
        </div>
    </article>

    <section class="mb-5">
        <h2>
            <label for="comment-input">
                Commentaires
            </label>
        </h2>
        <div class="form-floating">
            <form method="POST"  enctype="multipart/form-data">
                <textarea name="comment" id="comment-input" class="form-control" placeholder="Laissez vos commentaires ici...">
            </textarea>
                <button type="submit" class="btn btn-primary">
                    Envoyer
                </button>
            </form>
            <div>
                @forelse ($quizzes->comments as $comment)
                    <p>
                        <span class="badge text-primary">
                            {{ $comment->user->name }}
                        </span>

                    </p>
                    <small>{{ $comment['comment'] }}</small>
                @empty
                    <p>Aucun commentaire trouvé</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
