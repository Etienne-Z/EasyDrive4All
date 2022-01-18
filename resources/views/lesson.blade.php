@extends('layouts.app')
@section('content')
@php
    if($lesson->lesson_type === 0){
        $lesson->lesson_type = "Rijles";
    }elseif ($lesson->lesson_type === 1){
        $lesson->lesson_type = "Examen";
    }
@endphp
<div class="container">
    <div class="row justify-content-center">

        <h3 class="text-center subtitle-algemene-voorwaarden">LES INFORMATIE</h3>
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
                    <th>Doel</th>
                    <th>Resultaat</th>
                    <th>Commentaar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$lesson->first_name}}</td>
                    <td>{{$lesson->pickup_address}}</td>
                    <td>{{$lesson->pickup_city}}</td>
                    <td>{{$lesson->starting_time}}</td>
                    <td>{{$lesson->finishing_time}}</td>
                    <td>{{$lesson->lesson_type}}</td>
                    <td>{{$lesson->goal}}</td>
                    <td>{{$lesson->result}}</td>
                    <td>{{$lesson->comment}}</td>
                </tr>
            </tbody>
        </table>
        @if(Auth::user()->instructor)
            <div class="w-50 text-center lesson-form-container">
                <h2 class="text-center mb-2">Les resultaat invoeren</h2>
                <form action="/lesson/result" method="POST">
                    <input type="hidden" value="{{$lesson->id}}" name="id">
                    <div class="form-group">
                        <label for="result">Resultaat</label>
                        <select class="form-control text-center" id="result" name="result">
                            <option value="H">Herhalen</option>
                            <option value="O">Onvoldoende</option>
                            <option value="V">Voldoende</option>
                            <option value="G">Goed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaar</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                    </div>
                    @csrf
                    <button>Versturen</button>
                </form>
            </div>
        @endif
        <div class="w-50 text-center lesson-form-container">
            <h2 class="text-center mb-2">Les wijzigen</h2>
            <form action="/lesson/change" method="POST">
                <input type="hidden" value="{{$lesson->id}}" name="id">
                <div class="error">{{ $errors->first('date') }}</div>
                <div class="form-group">
                    <label for="date">Datum</label>
                    @php
                        $lesson->starting_time = str_replace(' ', 'T', $lesson->starting_time);
                    @endphp
                    <input class="form-control" type="datetime-local" id="date" name="date" value="{{$lesson->starting_time}}">
                </div>
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$lesson->pickup_address}}">
                    <label for="city">Stad</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$lesson->pickup_city}}">
                </div>
                @csrf
                <button>Aanpassen</button>
            </form>

                <button onclick="document.getElementById('cancel-lesson').style.display='block'">annuleren</button>

            <div id="cancel-lesson" class="logout-dialog" style="display: none; ">
                <b class="m-4">Weet u zeker dat u de les wilt annuleren?</b>

                <div class="button-yes-cancel">
                    <button class="button-yes"
                    onclick="event.preventDefault();
                             document.getElementById('cancel-form').submit();">JA</button>
                                       <button class="button-cancel"
                onclick=" document.getElementById('cancel-lesson').style.display='none'">ANNULEER</button>

                <form action="/lesson/cancel" id="cancel-form" method="post">
                    <input type="hidden" name="id" value={{$lesson->id}}>
                    @csrf
                </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
