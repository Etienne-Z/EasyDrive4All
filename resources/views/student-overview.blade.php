@extends('layouts.app')

@section('content')
    <div class="overview_header">
        <div class="success_rate_container">
            <h4>slagingspercentage</h4>
            <p>totale examens: {{ $total_exams}} </p>
            <p>percentage: {{$success_rate}} %</p>   
        </div>
        <h1 class="title text-center" >Leerlingen</h1>
        <a href="/student_register" class="button-add-user">Leerling toevoegen</a>
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
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->insertion}} {{$student->last_name}}</td>
                            <td>{{$student->email}}</td>
                            <td class="text-center"><i class="fas fa-user-edit"></i></td>
                            <td class="text-center">
                                    <button id="delete-user_button" class="delete-button" value="{{$student->id}}"><i class="fas fa-trash"></i></button>
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

