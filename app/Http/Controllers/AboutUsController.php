<?php

namespace App\Http\Controllers;

    /**
     * This class manages the about us page
     *
     * @copyright  2022 Examen groep 12
     */

class AboutUsController extends Controller
{
        /**
         * Returns the view of the about us page
         *
         * @return View     The required view
         */
    public function index(){
        return view('about-us');
    }


}
