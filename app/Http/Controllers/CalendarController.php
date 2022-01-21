<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lessons;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Lessons::whereDate('starting_time', '>=', $request->start)
                       ->whereDate('finishing_time',   '<=', $request->end)
                       ->get(['id', 'User_ID', 'Instructor_ID', 'pickup_address', 'pickup_city', 'starting_time', 'finishing_time']);
            return response()->json($data);
    	}
    	return view('Calendar/calendar');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$lesson = Lessons::create([
    				'User_ID'		=>	$request->User_ID,
    				'Instructor_ID'		=>	$request->Instructor_ID,
    				'pickup_address'		=>	$request->pickup_address,
                    'pickup_city'		=>	$request->pickup_city,
                    'starting_time'		=>	$request->starting_time,
                    'finishing_time'		=>	$request->finishing_time,
    			]);

    			return response()->json($lesson);
    		}

    		if($request->type == 'update')
    		{
    			$lesson = Lessons::find($request->id)->update([
    				'User_ID'		=>	$request->User_ID,
    				'Instructor_ID'		=>	$request->Instructor_ID,
    				'pickup_address'		=>	$request->pickup_address,
                    'pickup_city'		=>	$request->pickup_city,
                    'starting_time'		=>	$request->starting_time,
                    'finishing_time'		=>	$request->finishing_time,
    			]);

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