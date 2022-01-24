<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Returns the landing page for users who are not logged in
     *
     * @return View     The required view
     */
    public function welcome_page(){
        $success_rate =  $this->getExamResults();
        $total_exams = Exams::count();
        return view('welcome', compact(["success_rate","total_exams"]));
    }

    public function getExamResults(){
        $success_exams = Exams::ExamCompleted()->count();
        $total_exams = Exams::count();
        if($success_exams > 0 && $total_exams > 0){
            $percent = $success_exams / $total_exams * 100;
        }else{
            $percent = 0;
        }


        return $percent;
    }


        /**
         * Returns the terms and conditions view
         *
         * @return View     The required view
         */
    public function terms_conditions(){
        return view('terms_conditions');
    }
}
