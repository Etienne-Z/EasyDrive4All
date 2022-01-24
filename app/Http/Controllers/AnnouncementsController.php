<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;

class AnnouncementsController extends Controller
{
    public function studentIndex()
    {
        $announcements = Announcements::all()->where('role', 0);
        return view('Announcements/announcements', compact('announcements'));
    }

    public function instructorIndex()
    {
        $announcements = Announcements::all()->where('role', 1);
        return view('Announcements/announcements', compact('announcements'));
    }

    public function ownerIndex()
    {
        $announcements = Announcements::all();
        return view('Announcements/adminAnnouncements', compact('announcements'));
    }

    public function getOneAnnouncement($id)
    {
        $announcement = Announcements::Id($id)->first();
        // dd($announcement);
        $announcement_info = [
            "title" => $announcement->title,
            "role" => $announcement->role,
            "description" => $announcement->description,
        ];
        return view('Announcements/announcementsShow', compact('announcement_info'));
    }

    public function announcementForm(){
        return view('Announcements/announcementsCreate');
    }

    public function createAnnouncement(Request $request){
        $request->validate([
            'title' => 'required',
            'role' => 'required',
            'description' => 'required',
        ]);

        $announcement = new Announcements;
        $announcement->title = $request->title;
        $announcement->role = $request->role;
        $announcement->description = $request->description;
        // dd($request);
        $announcement->save();

        return response()->json(['success'=>'Successfully']);
    }

    public function announcementEditForm($id){
        $announcement = Announcements::Id($id)->first();
        return view('Announcements/announcementsEdit', compact('announcement'));
    }

    public function updateAnnouncement(Request $request){
        $announcement = Announcements::Id($request->id)->first();
        $request->validate([
            'title' => 'required',
            'role' => 'required',
            'description' => 'required',
        ]);
        // dd($announcement);
        $announcement->title = $request->title;
        $announcement->role = $request->role;
        $announcement->description = $request->description;
        $announcement->save();
        return response()->json(['success'=>'Successfully']);
    }

    public function deleteAnnouncement(Request $request){   
        $id = $request->id;
        Announcements::find($id)->delete();
        return $this->ownerIndex();

    }
}