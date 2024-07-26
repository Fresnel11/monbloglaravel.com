<?php

use App\Http\Controllers\ArticleController;
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
    Route::get('/', 'index');
    Route::get('/contact-us', 'contact');
    Route::get('/about', 'about');
});

Route::controller(ArticleController::class)->group(function(){
    Route::get('/articles', 'index')->name('articles.index');
    Route::get('/article/create', 'create')->name('articles.create')->middleware('auth');
    Route::post('/article', 'store')->name('articles.store')->middleware('auth');
    Route::get('/articles/{articles}', 'show')->name('articles.show');
    Route::get('/articles/{article}/edit', 'edit')->name('articles.edit')->middleware('auth');
    Route::patch('/articles/{article}', 'update')->name('articles.update')->middleware('auth');
    Route::delete('/articles/{article}', 'destroy')->name('articles.destroy')->middleware('auth');
});
/*Methode de routes recommadé*/


/*Routes d'autentification */
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->middleware('guest');

Route::get('/login', [SessionsController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [SessionsController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth');
// Route::get('/login', [SessionsController::class, 'login']);
// Route::get('/register', [LoginController::class, 'authenticate'])->name('authenticate');