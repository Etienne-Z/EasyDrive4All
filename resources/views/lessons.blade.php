@extends('layouts.app')
@php
    $now = new DateTime();
    $students = $info[0];
    $lessons = $info[1];
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="w-50 text-center lesson-form-container">
            @if(Auth::user()->instructor)
                <h2 class="text-center mb-2">Les toevoegen</h2>
                <form action="/lesson/create" method="POST">
                    <div class="form-group">
                        <label for="student">Leerling</label>
                        <select class="form-control text-center" id="student" name="student">
                            @foreach ($students as $student)
                                <option value="{{$student->id}}">{{$student->first_name . " " . $student->insertion . " " . $student->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Starttijd</label>
                        <input class="form-control" type="datetime-local" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="Type">Examens</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="0">Nee</option>
                            <option value="1">Ja</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Adres</label>
                        <input type="text" class="form-control" id="address" name="address">
                        <label for="city">Stad</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group">
                        <label for="type">Doel</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                    @csrf
                    <button>Les aanmaken</button>
                </form>
            @endif
        </div>
        <h3 class="text-center subtitle-algemene-voorwaarden">AFGEMAAKTE LESSEN</h3>
        <table class="lessons-overview">
            <thead>
                <tr>
                    @if(Auth::user()->instructor)
                        <th>Leerling</th>
                    @else
                        <th>Instructeur</th>
                    @endif
                    <th>Ophaal adres</th>
                    <th>Ophaal straat</th>
                    <th>Begintijd</th>
                    <th>Eindtijd</th>
                    <th>Les type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                @php
                    $Date = new DateTime($lesson->starting_time);
                    $difference_in_seconds = intval($Date->format('U') - $now->format('U'));
                    if($lesson->lesson_type === 0){
                        $lesson->lesson_type = "Rijles";
                    }elseif ($lesson->lesson_type === 1){
                        $lesson->lesson_type = "Examen";
                    }
                @endphp
                    @if($difference_in_seconds < 0)
                        <tr>
                            <td><a href="/lesson/{{$lesson->id}}">{{$lesson->first_name}}</a></td>
                            <td><a href="/lesson/{{$lesson->id}}">{{$lesson->pickup_address}}</a></td>
                            <td><a href="/lesson/{{$lesson->id}}">{{$lesson->pickup_city}}</a></td>
                            <td><a href="/lesson/{{$lesson->id}}">{{$lesson->starting_time}}</a></td>
                            <td><a href="/lesson/{{$lesson->id}}">{{$lesson->finishing_time}}</a></td>
                            <td><a href="/lesson/{{$lesson->id}}">{{$lesson->lesson_type}}</a></td>
                        </tr>
                    @endif
            @endforeach
            </tbody>
        </table>

        <h3 class="text-center subtitle-algemene-voorwaarden">TOEKOMSTIGE LESSEN</h3>
        <table class="lessons-overview">
            <thead>
                <tr>
                    @if(Auth::user()->instructor)
                        <th>Leerling</th>
                    @else
                        <th>Instructeur</th>
                    @endif
                    <th>Ophaal adres</th>
                    <th>Ophaal straat</th>
                    <th>Begintijd</th>
                    <th>Eindtijd</th>
                    <th>Les type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    @php
                        $Date = new DateTime($lesson->starting_time);
                        $difference_in_seconds = intval($Date->format('U') - $now->format('U'));
                    @endphp
                        @if($difference_in_seconds >= 0)
                            <tr>
                                <td><a href="/lesson/{{$lesson->id}}">{{$lesson->first_name}}</a></td>
                                <td><a href="/lesson/{{$lesson->id}}">{{$lesson->pickup_address}}</a></td>
                                <td><a href="/lesson/{{$lesson->id}}">{{$lesson->pickup_city}}</a></td>
                                <td><a href="/lesson/{{$lesson->id}}">{{$lesson->starting_time}}</a></td>
                                <td><a href="/lesson/{{$lesson->id}}">{{$lesson->finishing_time}}</a></td>
                                <td><a href="/lesson/{{$lesson->id}}">{{$lesson->lesson_type}}</a></td>
                            </tr>
                        @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
