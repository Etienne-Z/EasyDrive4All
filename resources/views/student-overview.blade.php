@extends('layouts.app')

@section('content')
    <div class="overview_header">
        <h1 class="title text-center">Leerlingen</h1>
        <div class="button-add-user">Leerling toevoegen</div>
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
                    @foreach ($students as $student )
                    {{-- {{dd($student)}} --}}
                        <tr>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->insertion}} {{$student->last_name}}</td>
                            <td>{{$student->email}}</td>
                            <td class="text-center"><i class="fas fa-user-edit"></i></td>
                            <td class="text-center">
                                <form action="/students_overview" method="POST">
                                    <input type="hidden" name="id" value="{{$student->id}}">
                                    @csrf
                                    <button class="delete-button"><i class="fas fa-trash"></i></button>
                                </form>

                                </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
