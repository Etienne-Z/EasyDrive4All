@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                @foreach ($lessons as $lesson)
                <tr>
                    <td>{{$lesson->first_name}}</td>
                    <td>{{$lesson->pickup_address}}</td>
                    <td>{{$lesson->pickup_city}}</td>
                    <td>{{$lesson->starting_time}}</td>
                    <td>{{$lesson->finishing_time}}</td>
                    <td>{{$lesson->lesson_type}}</td>
                    <td>{{$lesson->result}}</td>
                    <td>{{$lesson->comment}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
