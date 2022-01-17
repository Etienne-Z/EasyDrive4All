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
            $lessons = lessons::Instructor()->whereStudent(Auth::user()->id)->LessonInformation()->get();
        }
        return view('/lessons', compact('lessons'));
    }

    public function lesson($id){
        if(Auth::user()->instructor){
            $lesson = lessons::Student()->WhereInstructor(Auth::user()->instructor->id)->LessonInformation()->WhereId($id)->first();
        }else{
            $lesson = lessons::Instructor()->whereStudent(Auth::user()->id)->LessonInformation()->WhereId($id)->first();
        }
        return view('/lesson', compact('lesson'));
    }

    public function Postresult(Request $request){
        if(Auth::user()->instructor){
            $request->validate([
                "id" => "required",
                "result" => "required|max:1",
                "comment" => "nullable|max:255"
            ]);
            $id = $request->id;
            $lesson = lessons::WhereId($id)->first();
            $lesson->result = $request->result;
            $lesson->comment = $request->comment;

            return $this->lesson($id);
    }else{
        return $this->index();
    }
    }
}
