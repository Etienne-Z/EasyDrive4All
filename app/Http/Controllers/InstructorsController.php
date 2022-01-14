<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\instructor_has_users;

class InstructorsController extends Controller
{
    public function studentOverview(){
        $students = User::Student()->get();
        return view('student-overview',compact('students'));
    }

    public function deleteUser(Request $request, User $user)
    {

        $id = $request->id;
        $id = intval($id);
        dd($user->instructor_has_users);
        // dd(instructor_has_users::User($id)->first()->delete());
        dd(User::Id($id)->first());

    }

}
