@extends('layouts.master')
@section('contenu')
    <article class="card mb-3">
        <img src="{{ $article['image'] }}" alt="" class="card-img-top">
        <div class="card-body">
            <h2 class="card-title">
                {{ $article['title'] }}
            </h2>
            <p class="card-text ">{{ $article['body'] }}</p>
        </div>
    </article>

    <section class="mb-5">
        <h2>
            <label for="comment-input">
                Commentaires
            </label>
        </h2>
        <div class="form-floating">
        <form action="">
            <textarea
                name="comment"
                id="comment-input"
                class="form-control"
                placeholder="Laissez vos commentaires ici...">
            </textarea>
            <button type="submit" class="btn btn-primary">
                Envoyer
            </button>
        </form>
        <div>
           @forelse ($article->comments as $comment)
                <p>
                    <strong class="text-primary">
                        User id : {{$comment->user_id}}
                    </strong>
                </p>
               <p>{{$comment["comment"]}}</p>
           @empty
              <p>Aucun commentaire trouvé</p> 
           @endforelse
        </div>
        </div>
    </section>
@endsection
