<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QeustionMail;
class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

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
