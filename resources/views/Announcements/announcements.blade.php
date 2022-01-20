@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <table class="announcement-page">
                <thead>
                        <td>Titel</td>
                        <td>Mededeling</td>
                        
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>{{$announcement->title}}</td>
                            <td>{{substr($announcement->description,0,100)}}</td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
