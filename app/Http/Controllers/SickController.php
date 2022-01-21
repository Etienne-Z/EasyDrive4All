<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sickform;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

    /**
     * This class manages the sick report page
     *
     *
     * @copyright  2022 Examen groep 12
     */
class SickController extends Controller
{
        /**
         * Returns the sick report page
         *
         * @return View          The required view
         */
    public function index(){

        return view('instructeur/instructeur_sickform');
    }

        /**
         * Sends a sick mail to the owner
         *
         * @param Request   The data that is being send through with the form
         *
         * @return Json     The json response for the ajax request
         */
    public function sendMail(Request $request){

        $request->validate([
            'reason' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $data = array(
        'first_name' => auth::user()->first_name,
        'reason' => $request->reason,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,

        );

        Mail::to('owner@easydrive4all.nl')->send(new sickform($data));
        return response()->json(['success'=>'Successfully']);

    }
}
