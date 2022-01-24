@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="title text-center">Mededelingen</h1>
            <table class="announcement-page">
                <thead>
                        <td>Titel</td>
                        <td>Mededeling</td>
                        <td>Volledige Mededeling</td>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>{{$announcement->title}}</td>
                            <td>{{substr($announcement->description,0,100)}}</td>
                            <td class="text-center"><i class="fas fa-folder-open"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
