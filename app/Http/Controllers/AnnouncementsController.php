<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcements::all();
        return view('Announcements/announcements', compact('announcements'));
    }
}
