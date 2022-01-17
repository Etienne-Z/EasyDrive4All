@extends('layouts.app')
@php
    $now = new DateTime();
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
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
