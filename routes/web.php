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

Route::get('/algemene_voorwaarden', function () {
    return view('terms_conditions');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index']);

Route::get('/contact', [ContactController::class,'index']);
Route::post('/contact', [ContactController::class,'contactForm']);

Route::get('/lessons', [LessonsController::class, 'index']);
Route::get('/lesson/{id}', [LessonsController::class, 'lesson']);
route::post('/lesson/result', [LessonsController::class, 'PostResult']);
route::post('/lesson/date', [LessonsController::class, 'ChangeDate']);

Route::get('/students_overview', [InstructorsController::class, 'studentOverview']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/students_overview', [InstructorsController::class, 'deleteUser']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/inschrijven', 'App\Http\Controllers\FormController@index');
Route::post('/inschrijven/versturen', 'App\Http\Controllers\FormController@sendMail');
