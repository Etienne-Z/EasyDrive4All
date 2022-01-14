<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
// authentication for being logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * Returns all the info the company has about the user
     *
     */

    public function index(){
        // Logged in user
        $user = Auth::user();
        $user_info = [
            "Voornaam" => $user->first_name,
            "Tussenvoegsels" => $user->insertion,
            "Achternaam" => $user->last_name,
            "Stad" => $user->city,
            "Adres" => $user->address,
            "Postcode" => $user->zipcode,
            "email" => $user->email,
            "lessen_tegoed" => $user->lesson_hours
        ];
        return view('profile', compact('user_info'));
    }
}
