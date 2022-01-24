<?php

namespace App\Http\Controllers;

use App\Models\instructor_has_users;
use App\Models\lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    /**
     * This class manages the lessons
     *
     * This class manages functions for the CR actions for the lessons page that contains all lessons and RUD actions for the specific lesson.
     *
     * @copyright  2022 Examen groep 12
     */
class LessonsController extends Controller
{
        /**
         * Returns the overview of all the lessons that the user has
         *
         * @return students     All the students linked to the instructor
         * @return lessons      All the lessons the user has
         * @return View         The required view
         */
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

        /**
         * Returns the overview of all the lessons that the user has
         *
         * @param id            The ID of the specific lesson
         *
         * @return lesson       The information of the specific lesson
         * @return View         The required view
         */
    public function lesson($id){
        if(Auth::user()->instructor){
            $lesson = lessons::Student()->WhereInstructor(Auth::user()->instructor->id)->LessonInformation()->WhereId($id)->first();
        }else{
            $lesson = lessons::Instructor()->whereStudent(Auth::user()->id)->LessonInformation()->WhereId($id)->first();
        }
        return view('lesson', compact('lesson'));
    }

        /**
         * inserts the result of the specific lesson into the database
         *
         * @param request       The given data that is being send through with the form
         *
         * @return id           The id of the specific lesson
         * @return View         The required view
         */
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
            $lesson->save();

            return $this->lesson($id);
        }else{
            return $this->index();
        }
    }

        /**
         * change  the datetime of the specific lesson into the database
         *
         * @param request       The given data that is being send through with the form
         *
         * @return id           The id of the specific lesson
         * @return View         The required view
         */
    public function ChangeLesson(Request $request){
        // Validation error fix voor engelse tijd
        if(Auth::user()->instructor){
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
            if(strtotime($lesson->starting_time) > time() + (60*60*25)){
                $lesson->starting_time = date("Y-m-d H:i:s", (strtotime(str_replace("T", " ", $request->date))));
                if($lesson->type == 0){
                    $lesson->finishing_time = date("Y-m-d H:i:s", (strtotime($request->date) + 60*60));
                }elseif($lesson->type == 1){
                    $lesson->finishing_time = date("Y-m-d H:i:s", (strtotime($request->date) + 60*60*2));
                }
                $lesson->pickup_address = $request->address;
                $lesson->pickup_city = $request->city;
                $lesson->save();
                $message = "";
            }else{
                $message = "U mag niet binnen 24 uur de afspraak wijzigen";
            }
            // return redirect back met error message van maken.
            return $this->lesson($request->id);
        }else{
            return $this->index();
        }

    }

        /**
         * deletes the specific lesson into the database
         *
         * @param request       The given data that is being send through with the form
         *
         * @return id           The id of the specific lesson
         * @return View         The required view
         */
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

        /**
         * Creates a lesson instance in the database
         *
         * @param request       The given data that is being send through with the form
         *
         * @return View         The required view
         */
    public function CreateLesson(Request $request){
        //Moet nog kijken of instructeur wel vrij is
        $request->validate([
            "student" => "required",
            "date" => "required|date|date_format:Y-m-d\TH:i|after:now",
            "address" => "required|max:255",
            "city" => "required|max:255",
            "type" => "required|max:1",
            "goal" => "required|max:255"
        ]);
        $lesson = new lessons();
        $lesson->Student_ID = intval($request->student);
        $lesson->Instructor_ID = Auth::user()->instructor->id;
        $lesson->pickup_address = $request->address;
        $lesson->pickup_city = $request->city;
        $lesson->starting_time = date("Y-m-d H:i:s", (strtotime(str_replace("T", " ", $request->date))));
        if($request->type == 0){
            $lesson->finishing_time = date("Y-m-d H:i:s", (strtotime($request->date) + 60*60));
        }elseif($request->type == 1){
            $lesson->finishing_time = date("Y-m-d H:i:s", (strtotime($request->date) + 60*60*2));
        }
        $lesson->lesson_type = $request->lesson_type;
        $lesson->Goal = $request->goal;
        $lesson->save();
        return $this->index();
    }
}
