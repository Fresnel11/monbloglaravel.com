<?php

use App\Http\Controllers\PagesController;
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
/*Methode de routes recommadé*/
