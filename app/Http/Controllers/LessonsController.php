<?php

namespace App\Http\Controllers;

use App\Models\instructor_has_users;
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
        $students = instructor_has_users::WhereInstructor()->name()->get();
        $info = [
            0 => $students,
            1 => $lessons
        ];
        return view('lessons', compact('info'));
    }

    public function lesson($id){
        if(Auth::user()->instructor){
            $lesson = lessons::Student()->WhereInstructor(Auth::user()->instructor->id)->LessonInformation()->WhereId($id)->first();
        }else{
            $lesson = lessons::Instructor()->whereStudent(Auth::user()->id)->LessonInformation()->WhereId($id)->first();
        }
        return view('lesson', compact('lesson'));
    }

    public function PostResult(Request $request){
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

    public function ChangeLesson(Request $request){
        // Moet nog 24h van te voren worden gedaan
        // Validation error fix voor engelse tijd
        $request->merge(["date" => str_replace("/", "-", $request->date)]);
        if(!str_ends_with($request->date, ":00")){
            $request->merge(['date' => $request->date . ":00"]);
        }
        $request->validate([
            "id" => "required",
            "date" => "required|date|date_format:Y-m-d\TH:i:s|after:now",
            "address" => "required",
            "city" => "required"
        ]);
        $lesson = lessons::WhereId($request->id)->first();
        $lesson->starting_time = str_replace("T", " ", $request->date);
        $lesson->finishing_time = date("Y-m-d H:i:s", (strtotime($request->date) + 60*60));
        $lesson->pickup_address = $request->address;
        $lesson->pickup_city = $request->city;
        $lesson->save();

        return $this->lesson($request->id);
    }

    public function CancelLesson(Request $request){
        $request->validate([
            "id" => "required"
        ]);
        $lesson = lessons::WhereId($request->id)->first();
        if(strtotime($lesson->starting_time) >= strtotime(date("now") + 60*60*24)){
            $lesson->delete();
        }
        return $this->index();
    }

    public function CreateLesson(Request $request){
        //Kijken of de instructeur dan wel vrij is.
    }
}
