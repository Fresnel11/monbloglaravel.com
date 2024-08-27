<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Routes de base*/
// Route::get('/', PagesController::class, 'index');

// Route::get('/contact-us', PagesController::class, 'contact');
/*Routes de base*/

/*Methode de routes recommadé*/
Route::controller(PagesController::class)->group(function(){
    Route::get('/', 'acceuil');
    Route::get('/contact-us', 'contact');
    Route::get('/about', 'about');
});

Route::controller(QuizController::class)->group(function(){
    Route::get('/quizzes', 'index')->name('quizzes.index');
    Route::get('/quizzes/create', 'create')->name('quizzes.create')->middleware('auth');
    Route::post('/quizzes', 'store')->name('quizzes.store')->middleware('auth');
    Route::get('/quizzes/show', 'show')->name('quizzes.show');
    Route::get('/quizzes/{quizze}/edit', 'edit')->name('quizzes.edit')->middleware('auth');
    Route::patch('/quizzes/{quizze}', 'update')->name('quizzes.update')->middleware('auth');
    Route::delete('/quizzes/{quizze}', 'destroy')->name('quizzes.destroy')->middleware('auth');
});



/*Routes d'autentification */
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->middleware('guest');

Route::get('/login', [SessionsController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [SessionsController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth');
// Route::get('/login', [SessionsController::class, 'login']);
// Route::get('/register', [LoginController::class, 'authenticate'])->name('authenticate');
Route::delete('/user/delete', [UserController::class, 'destroy'])->middleware('auth')->name('user.destroy');
Route::patch('/user/update', [UserController::class, 'update'])->middleware('auth')->name('user.update');

// Les routes pour ajouter les quizzes accessible uniquement à l'admin
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin/quizz/create', [QuizController::class, 'create'])->name('quiz.create')->middleware('admin');
    Route::post('/admin/quizz/store', [QuizController::class, 'store'])->name('quiz.store')->middleware('admin');
    // Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});