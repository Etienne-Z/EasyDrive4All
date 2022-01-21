@extends('layouts.app')

@section('content')
    <div class="overview_header">
        <h1 class="title text-center">Instructeuren</h1>
        <a href="/instructors_register" class="button-add-user">instructeur toevoegen</a>
    </div>
    <div class="container">
        <div class="row">

            <table class="overview">
                <thead>
                        <td>Voornaam</td>
                        <td>Achternaam</td>
                        <td>E-mail</td>
                        <td>Aanpassen</td>
                        <td>Verwijderen</td>
                </thead>
                <tbody>
                    @foreach ($instructors as $instructor )
                        <tr>
                            <td>{{$instructor->first_name}}</td>
                            <td>{{$instructor->insertion}} {{$instructor->last_name}}</td>
                            <td>{{$instructor->email}}</td>
                            <td class="text-center"><a href="/instructors_change/{{$instructor->id}}"><i class="fas fa-user-edit"></i></a></td>
                            <td class="text-center">
                                    <button id="delete-user_button" class="delete-button" value="{{$instructor->id}}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div id="dialog-delete-user" class="logout-dialog delete-user" style="display:none">
        <p>Weet u zeker dat u de gebruiker wilt verwijderen?</p>
        <form id="delete-user"  method="post" action="/students_overview">
            <input type="hidden" name='id' id="deleting-user-id">
            @csrf
            <button class="button-yes inline-block">Ja</button>
        </form>
        <button id="no-close" onclick="document.getElementById('dialog-delete-user').style.display='none'" class="button-cancel">Nee</button>
    </div>

@endsection

