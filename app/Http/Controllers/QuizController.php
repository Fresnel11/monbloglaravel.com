<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizzRequest;
use App\Http\Requests\UpdateQuizzRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Quizzes;
use App\Models\IncorrectAnswer;
use App\Models\UserAnswer;
use App\Models\UserQuizResult;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiches toutes les ressources (articles)
     */
    public function index()
    {
        $quizzes = Quizzes::inRandomOrder()->limit(10)->get();
        return view('quizzes.partials.index', compact('quizzes'));
    }

    public function submit(Request $request)
    {
        $score = 0;
        $user = auth()->user(); //Récuperer l'utilisateur connecté
        $data = $request->all();

        // Parcourir chaque question
        foreach ($data as $key => $value) {
            if (strpos($key, 'question_') === 0) {
                $questionId = str_replace('question_', '', $key);
                $question = Quizzes::find($questionId);

                if ($question) {
                    UserAnswer::create([
                        'user_id' => $user->id,
                        'quiz_id' => $question->id,
                        'user_answer' => $value === 'true' ? 1 : 0, //Si vrai ou Faux
                    ]);
                }

                // Vérifier si la réponse est correcte
                if (($value === 'true' && $question->correct_answer) || ($value === 'false' && !$question->correct_answer)) {
                    $score++;
                }
            }
        }

        UserQuizResult::create([
            'user_id' => $user->id,
            'quiz_id' => $question->id,
            'score' => $score,
            'played_at' => now(),
        ]);

        // Récupérer les résultats pour l'utilisateur
        $quizResults = UserQuizResult::where('user_id', $user->id)
            ->orderBy('played_at', 'asc')
            ->get();

        // Rediriger avec le score
        // return redirect()->route('quizzes.dashboard')->with('score', $score);
        // Passer les résultats à la vue dashboard
        return view('quizzes.dashboard', compact('quizResults'))
            ->with('score', $score);
    }

    public function dashboard()
    {
        $userId = auth()->user()->id;
        $quizResults = UserQuizResult::where('user_id', $userId)
            ->orderBy('played_at', 'asc')
            ->get();

        dd($quizResults);
        return view('quizzes.dashboard', compact('quizResults'));
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'un quizz
     */
    public function create()
    {
        $quizzes = Quizzes::all();
        return view('quizzes.create', compact('quizzes'));
    }

    public function answer(Request $request)
    {
        $correct = $request->input('correct');
        $score = Session::get('score', 0);

        if ($correct) {
            $score++;
        }

        Session::put('score', $score);

        $nextQuiz = Quizzes::find($request->input('next_quiz_id'));

        if ($nextQuiz) {
            return response()->json(['quiz' => $nextQuiz]);
        } else {
            return response()->json(['redirect' => route('quizzes.dashboard')]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * Stock la ressource dans la BDD
     */
    public function store(StoreQuizzRequest $request)
    {
        $quiz = new Quizzes();
        $quiz->question = $request->input('question');
        $quiz->correct_answer = $request->input('correct_answer');
        $quiz->explanation = $request->input('explanation', '');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $quiz->image = $imagePath;
        }

        $quiz->save();

        return redirect()->route('quizzes.create')->with('success', 'Quiz ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     * Affiche une ressource spécifique
     */
    public function show(Request $request)
    {
        // Récupérer l'index de la question courante depuis la session, avec 0 comme valeur par défaut
        $questionCouranteIndex = $request->session()->get('questionIndex', 0);

        // Récupérer la question courante en utilisant l'index
        $quiz = Quizzes::skip($questionCouranteIndex)->first();

        // Si la question n'existe pas, rediriger vers le dashboard
        if (!$quiz) {
            return redirect()->route('quizzes.dashbord');
        }

        // Passer la question et l'index à la vue
        return view('quizzes.partials.index', [
            'quiz' => $quiz,
            'questionIndex' => $questionCouranteIndex
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire d'édition
     */
    public function edit($id)
    {
        // Trouver le quiz par ID
        $quizzes = Quizzes::findOrFail($id);

        // Retourner la vue d'édition avec les quizzes
        // dd("hello");
        return view('quizzes.edit', compact('quizzes'));
    }


    /**
     * Update the specified resource in storage.
     * Mettre à jour une ressource spécifique dans la base de donnée
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'correct_answer' => 'required|string|max:255',
            'explanation' => 'nullable|string',
        ]);

        // Trouver le quiz par ID
        $quizzes = Quizzes::findOrFail($id);

        // Mettre à jour les champs du quiz
        $quizzes->question = $validated['question'];
        $quizzes->correct_answer = $validated['correct_answer'];
        $quizzes->explanation = $validated['explanation'];

        // Gérer le fichier image si un nouveau fichier est téléchargé
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($quizzes->image) {
                Storage::delete('public/' . $quizzes->image);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $quizzes->image = $imagePath;
        }

        // Sauvegarder les changements dans la base de données
        $quizzes->save();

        // Rediriger avec un message de succès
        return redirect()->route('quizzes.create')->with('success', 'Quiz mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quiz = Quizzes::findOrFail($id);

        if ($quiz->image) {
            Storage::delete('public/' . $quiz->image);
        }

        // Supprimer le quizz de la BDD
        $quiz->delete();

        return redirect()->route('quizzes.create')->with('success', 'Quizz supprimé avec succès !');
    }

    // public function incrementUserScore() 
    // {
    //     $user = auth()->user();
    //     $user->score += 5; //Incrémente le score de l'utilisateur à plus 5
    //     $user->save(); // sauvegarde le score
    // }

    // public function saveIncorrectAnswer($quizz)
    // {
    //     IncorrectAnswer::create([
    //         'user_id' => auth()->id(),
    //         'quiz_id' => $quizz->id,
    //         'user_answer' => now(),
    //     ]);
    // }

    // public function checkAnswer(Request $request, $id)
    // {
    //     $quiz = Quizzes::findOrFail($id);
    //     // Récuperer la réponse du user depuis le formulaire
    //     $userAnswer = $request->input('answer');
    //     $questionCouranteIndex = $request->session()->get('current_question_index', 0);
    //     $quizzes = Quizzes::all();
    //     // stocker la réponse de l'utilisateur
    //     UserAnswer::create([
    //         'user_id' => auth()->id(),
    //         'quiz_id' => $quiz->id,
    //         'user_answer' => $userAnswer,
    //     ]);

    //     $nextQuestionIndex = $questionCouranteIndex + 1;

    //     if ($nextQuestionIndex >= 10){
    //         return redirect()->route('quizzes.dashbord');
    //     }

    //     $request->session()->put('current_question_index', $nextQuestionIndex);
    //     // Comparer la reponse de l'utilisateur avec la bonne réponse
    //     $isCorrect = $quiz->correct_answer == $userAnswer;


    //     // Logique pour la comparaison des résultats
    //     if($isCorrect){
    //         $this->incrementUserScore();
    //         session()->flash('success', 'Bonne réponse !');
    //     } else {
    //         $correctAnswerText = $quiz->correct_answer ? 'Vrai' : 'Faux';
    //         session()->flash('error', 'Mauvaise réponse !');
    //         return redirect()->route('')->with('error', "Incorrect! la bonne réponse est $correctAnswerText. {$quiz->explanation}");
    //     }

    // }

    // public function saveAnswer(Request $request)
    // {
    //     $userId = Auth::id(); // Je m'assure que l'utilisateur est connecté
    //     $answer = $request->input('answer');
    //     $currentQuestionIndex = $request->session()->get('current_question_index', 0);
    //     $quizzes = Quizzes::all();
    //     $quiz = $quizzes->get($currentQuestionIndex);

    //     if(!$quiz) {
    //         return redirect()->route('dashbord');
    //     }

    //     $correctAnswer = $quiz->correct_answer;
    //     $score = $request->session()->get('score', 0);

    //     if($answer === $correctAnswer) {
    //         $score++;
    //     }

    //     // Stocker la réponse de l'utilisateur
    //     UserAnswer::updateOrCreate(
    //         [
    //             'user_id' => $userId,
    //             'quiz_id' => $quiz->id,
    //         ],
    //         [
    //             'user_answer' => $answer,
    //         ]
    //     );

    //     $request->session()->put('score', $score);

    //     $nextQuestionIndex = $currentQuestionIndex + 1;

    //     if($nextQuestionIndex >= 10) {
    //         // Rediriger vers le tableau de bord si 10 questions ont été répondues
    //         return redirect()->route('quizzes.dashbord');
    //     }

    //     $request->session()->put('current_question_index', $nextQuestionIndex);

    //     return redirect()->route('quizzes.show');
    // }

    public function submitAnswer(Request $request)
    {
        // Validation de la réponse
        $request->validate([
            'answer' => 'required|boolean'
        ]);

        // Récupérer l'index de la question courante depuis la session
        $questionCouranteIndex = $request->session()->get('questionIndex', 0);

        // Récupérer la question courante
        $quiz = Quizzes::skip($questionCouranteIndex)->first();
        $isCorrect = $request->answer == $quiz->correct_answer;

        // Stocker la réponse ou le score ici

        // Incrémenter l'index pour la prochaine question
        $request->session()->put('questionIndex', $questionCouranteIndex + 1);

        // Vérifier si nous avons atteint la fin des questions
        if ($questionCouranteIndex >= 9) { // Supposons que nous avons 10 questions
            return redirect()->route('quizzes.dashboard');
        }

        // Rediriger vers la prochaine question
        return redirect()->route('quizzes.show');
    }
}
