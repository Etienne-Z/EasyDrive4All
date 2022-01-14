<?php

namespace App\Http\Controllers;

use App\Models\lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{
    public function index(){
        if(Auth::user()->instructor){
            $lessons = lessons::Student()->WhereInstructor(Auth::user()->instructor->id)->LessonInformation()->get();
        }else{
            $lessons = lessons::Instructor()->WhereStudent(Auth::user()->id)->LessonInformation()->get();
            $lessons = lessons::Instructor()->whereStudent(Auth::user()->id)->LessonInformation()->get();
        }
        return view('/lessons', compact('lessons'));
    }
}
