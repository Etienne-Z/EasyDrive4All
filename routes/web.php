<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstructorHasUsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\CalendarController;

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


Auth::routes();

Route::group(['middleware' => ['auth']], function(){

    // Homepage
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Profile of the logged in user
    Route::get('/profile', [ProfileController::class, 'index']);


// Announcements Routes
Route::get('/studentannouncements', [AnnouncementsController::class, 'studentIndex']);
Route::get('/instructorannouncements', [AnnouncementsController::class, 'instructorIndex']);
Route::get('/ownerannouncements', [AnnouncementsController::class, 'ownerIndex']);
Route::get('/createannouncement', [AnnouncementsController::class, 'announcementForm']);
Route::post('/createannouncement', [AnnouncementsController::class, 'createAnnouncement']);
Route::get('/editannouncement/{id}', [AnnouncementsController::class, 'announcementEditForm']);
Route::put('/editannouncement/{id}', [AnnouncementsController::class, 'updateAnnouncement']);

// Calendar Routes
Route::get('calendar', [CalendarController::class, 'index']);
Route::post('calendar/action', [CalendarController::class, 'action']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::POST('/students_overview', [InstructorsController::class, 'deleteUser']);
    //Lessons CRUD actions for instructor & student
    Route::get('/lesson/{id}', [LessonsController::class, 'lesson']);
    Route::post('/lesson/cancel', [LessonsController::class, 'CancelLesson']);
    Route::post('/lesson/change', [LessonsController::class, 'ChangeLesson']);

    //If logged user is instructor

        //lesson create actions
        Route::post('/lesson/result', [LessonsController::class, 'PostResult']);
        Route::post('/lesson/create', [LessonsController::class, 'CreateLesson']);

        //Overview of all students that the instructor has
        Route::get('/students', [InstructorHasUsersController::class, 'index']);

        // call in sick for instructors
        Route::get('/instructeur/ziekmelding', 'App\Http\Controllers\SickController@index');
        Route::post('/instructeur/ziekmelding', 'App\Http\Controllers\SickController@sendMail');
    });

    //If logged user is admin
    Route::group(['middleware' => ['Admin']], function(){

        //Student overview for the owner with CRUD actions
        Route::get('/students_overview', [AdminController::class, 'studentOverview']);
        Route::POST('/students_overview', [AdminController::class, 'deleteUser']);
        Route::get('/student_register', [AdminController::class, 'studentRegister']);
        Route::POST('/student_register', [AdminController::class, 'register']);

        //Instructor overview for the owner with CRUD actions
        Route::get('/instructors_overview', [AdminController::class, 'InstructorOverview']);
        Route::get('/instructors_register', [AdminController::class, 'InstructorRegister']);
        Route::post('/instructors_register', [AdminController::class, 'register']);
    });

// Register form for new users
Route::get('/inschrijven', 'App\Http\Controllers\FormController@index');
Route::post('/inschrijven/versturen', 'App\Http\Controllers\FormController@sendMail');

// About us page
Route::get('/about-us', [AboutUsController::class, 'index']);

// Contactpage
Route::get('/contact', [ContactController::class,'index']);
Route::post('/contact', [ContactController::class,'contactForm']);

//Default landing page
Route::get('/', [HomeController::class,'Landing']);

// terms of conditions page for users
Route::get('/algemene_voorwaarden', [HomeController::class,'terms_conditions']);
