<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QeustionMail;

    /**
     * This class manages the contact page
     *
     *
     * @copyright  2022 Examen groep 12
     */
class ContactController extends Controller
{
        /**
         * Returns the view of the contact page
         *
         * @return View     The required view
         */
    public function index(){
        return view('contact');
    }

        /**
         * Send the data of the form the the owner
         *
         * @param Request   The data that is inside the form
         *
         * @return Mail     Mails the data towards the owner
         * @return Json     The json response for the ajax request
         */
    public function contactForm(Request $request){
        $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required',
            'vraag' => 'required',
        ]);
        Mail::to('info@easydrive4all.nl')->send(new QeustionMail($request));
        return response()->json(['success'=>'Successfully']);
    }
}
