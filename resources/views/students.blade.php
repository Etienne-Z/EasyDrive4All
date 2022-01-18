@extends('layouts.app')

@section('content')
    <div class="overview_header">
        <h1 class="title text-center">Leerlingen</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class=" d-flex justify-content-center w-100">
                <table class="lessons-overview w-50">
                    <thead>
                            <th>Student</th>
                            <th>Email</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$student->first_name}} {{$student->insertion}} {{$student->last_name}}</td>
                                <td>{{$student->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
