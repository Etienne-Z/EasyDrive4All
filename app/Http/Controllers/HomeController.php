<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function landing(){
        return view('welcome');
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
