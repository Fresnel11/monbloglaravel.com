@extends('layouts.master')

@section('contenu')
@if(session('score') < 5)
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        <h4 class="alert-heading">Oh non !</h4>
        <p>Votre score est de <strong>{{ session('score') }} /10</strong>. Ne vous découragez pas, essayez à nouveau !</p>
        <hr>
        <p class="mb-0">Continuez à vous entraîner, vous ferez mieux la prochaine fois.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@else
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <h4 class="alert-heading">Félicitations !</h4>
        <p>Vous avez complété le quiz avec un score de <strong>{{ session('score') }} /10</strong> !</p>
        <hr>
        <p class="mb-0">Continuez à vous entraîner pour obtenir un score encore meilleur !</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<canvas id="userProgressChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let ctx = document.getElementById('userProgressChart').getContext('2d');
    let quizResults = @json($quizResults); // Passer les résultats de PHP à Javascript

    let labels = quizResults.map(result => new Date(result.played_at).toLocaleDateString()); // Corrected date formatting
    let scores = quizResults.map(result => result.score);

    const chart = new Chart(ctx, {
        type: 'bar', // Type de graphique
        data: {
            labels: labels, // Date des sessions des quizz
            datasets: [{
                label: 'Score au quiz',
                data: scores, // Score des sessions
                borderColor: 'RGB(10 128 246)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            }
        }
    });
</script>
@endsection
