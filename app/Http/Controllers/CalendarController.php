<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\instructor_has_users;
use Illuminate\Support\Facades\Auth;
use App\Models\Lessons;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax()){
            $start = Date('Y-m-d H:i:s', strtotime($request->start));
            $end = Date('Y-m-d H:i:s', strtotime($request->end));
            if(Auth::user()->instructor){
                $data = Lessons::
                Student()
                ->whereDate($start, $end)
                ->get();
            }else{
                $data = Lessons::
                Instructor()
                ->whereDate($start, $end)
                ->get();
            }
            return response()->json($data);
    	}
        $students = instructor_has_users::WhereInstructor()->name()->get();
    	return view('Calendar/calendar', compact('students'));
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add'){
                $lesson = new Lessons();
                $lesson->Student_ID = $request->Student_ID;
                $lesson->Instructor_ID = $request->Instructor_ID;
                $lesson->pickup_address = $request->pickup_address;
                $lesson->pickup_city = $request->pickup_city;
                $lesson->starting_time = $request->starting_time;
                $lesson->finishing_time = $request->finishing_time;
                $lesson->lesson_type = $request->lesson_type;
                $lesson->goal = $request->goal;
                $lesson->save();

    			return response()->json($lesson);
    		}

    		if($request->type == 'update')
    		{

    			$lesson = Lessons::whereId($request->id)->update([
                    'starting_time'		    =>	$request->starting_time,
                    'finishing_time'		=>	$request->finishing_time,
    			]);
                echo $lesson;
    			return response()->json($lesson);
    		}

    		if($request->type == 'delete')
    		{
    			$lesson = Lessons::find($request->id)->delete();

    			return response()->json($lesson);
    		}
    	}
    }
}
?>
