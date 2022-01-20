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
                            <td class="text-center"><i class="fas fa-edit"></i></td>
                            <td class="text-center">
                                    <button id="delete-user_button" class="delete-button" value="{{$announcement->id}}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
