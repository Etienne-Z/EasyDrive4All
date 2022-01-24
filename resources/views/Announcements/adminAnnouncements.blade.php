@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="overview_header">
                <h1 class="title text-center">Mededelingen</h1>
                <a href="/createannouncement" class="button-add-user">Mededeling toevoegen</a>
            </div>
            <table class="announcement-page">
                <thead>
                        <td>Type</td>
                        <td>Titel</td>
                        <td>Mededeling</td>
                        <td>Aanpassen</td>
                        <td>Verwijderen</td>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>{{$announcement->role}}</td>
                            <td>{{$announcement->title}}</td>
                            <td>{{substr($announcement->description,0,80)}}</td>
                            <td class="text-center">
                                <a href="/editannouncement/{{$announcement->id}}"><i class="fas fa-user-edit"></i>
                            </td>
                            <td class="text-center">
                                <button id="annoucement_delete_button"class="delete-button" value="{{$announcement->id}}"
                                    onclick="document.getElementById('dialog-delete-announcement').style.display='block'"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div id="dialog-delete-announcement" class="logout-dialog delete-user" style="display:none">
        <p>Weet u zeker dat u deze mededeling wilt verwijderen?</p>
        <form id="delete-user"  method="POST" action="/ownerannouncements">
            <input type="hidden" name='id' id="deleting-announcement-id">
            @csrf
            <button class="button-yes inline-block">Ja</button>

        </form>
        <button id="no-close" onclick="document.getElementById('dialog-delete-announcement').style.display='none'" class="button-cancel">Nee</button>
    </div>  
@endsection
