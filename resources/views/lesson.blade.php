@extends('layouts.app')
@section('content')
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
                    <th>Resultaat</th>
                    <th>Commentaar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$lesson->first_name}}</td>
                    <td>{{$lesson->pickup_address}}/td>
                    <td>{{$lesson->pickup_city}}</td>
                    <td>{{$lesson->starting_time}}</td>
                    <td>{{$lesson->finishing_time}}</td>
                    <td>{{$lesson->lesson_type}}</td>
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
    </div>
</div>
@endsection
