<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\LessonsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// terms of conditions page for users 
Route::get('/algemene_voorwaarden', function () {
    return view('terms_conditions');
});
// home page for logged in users
Route::get('/home', [HomeController::class, 'index'])->name('home');
// about us page for more information about the company
Route::get('/about-us', [AboutUsController::class, 'index']);
// contact page and form for new customers
Route::get('/contact', [ContactController::class,'index']);
Route::post('/contact', [ContactController::class,'contactForm']);
// lessons overview
Route::get('/lessons', [LessonsController::class, 'index']);

// student overview for the owner with CRUD actions
Route::get('/students_overview', [InstructorsController::class, 'studentOverview']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::POST('/students_overview', [InstructorsController::class, 'deleteUser']);

//authetication routes
Auth::routes();

// register new customers
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/inschrijven', 'App\Http\Controllers\FormController@index');
Route::post('/inschrijven/versturen', 'App\Http\Controllers\FormController@sendMail');

// call in sick for instructors 
Route::get('/instructeur/ziekmelding', 'App\Http\Controllers\SickController@index');
Route::post('/instructeur/ziekmelding', 'App\Http\Controllers\SickController@sendMail');
