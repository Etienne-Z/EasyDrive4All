@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <table class="announcement-page">
                <thead>
                        <td>Type Mededeling</td>
                        <td>Titel</td>
                        <td>Mededeling</td>
                        
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>{{$announcement->role}}</td>
                            <td>{{$announcement->title}}</td>
                            <td class="announcement-block">{{$announcement->description}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
