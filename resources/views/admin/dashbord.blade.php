@extends('layouts.master')

@section('contenu')
    <div class="container">
        <h1>Tableau de bord de l'administration</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total des quiz</h5>
                        <p class="card-text">{{ $totalQuizzes }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total des utilisateurs</h5>
                        <p class="card-text">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Top 10 des utilisateurs</h5>
                        <ul class="list-group">
                            @foreach($topUsers as $user)
                                <li class="list-group-item">{{ $user->name }} - {{ $user->score }} points</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection