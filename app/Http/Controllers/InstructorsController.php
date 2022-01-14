<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\instructor_has_users;
use App\Models\lessons;

class InstructorsController extends Controller
{
    public function studentOverview(){
        $students = User::Student()->get();
        return view('student-overview',compact('students'));
    }

    public function deleteUser(Request $request)
    {

        $id = $request->id;
        $id = intval($id);
        instructor_has_users::where('User_id', $id)->delete();
        $lessen = lessons::where('User_id', $id)->get();
        foreach($lessen as $les){
            $les->delete();
        }
        dd(User::Id($id)->first()->delete());

    }

}
