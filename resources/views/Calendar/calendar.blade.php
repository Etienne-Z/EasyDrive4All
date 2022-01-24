@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
</head>
<body>

  <div id="modal" style="display:none;" class="w-50 text-center lesson-form-container ml-auto mr-auto">
            @if(Auth::user()->instructor)
                <h2 class="text-center mb-2">Les toevoegen</h2>
                <form id="create_lesson" >
                    <div class="form-group">
                        <input type="hidden" name="instructor" id="instructor" value="{{Auth::user()->instructor->id}}">
                    </div>
                    <div class="form-group">
                        <label for="student">Leerling</label>
                        <select class="form-control text-center" id="student" name="student">
                            @foreach ($students as $student)
                                <option value="{{$student->id}}">{{$student->first_name . " " . $student->insertion . " " . $student->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Type">Examens</label>
                        <select class="form-select" name="type" id="type">
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
                        <label for="goal">Doel</label>
                        <input type="text" class="form-control" id="goal" name="goal">
                    </div>
                    @csrf
                    <button>Les aanmaken</button>
                </form>
            @endif
        </div>

        <div class="container">
            <div id="calendar"></div>
        </div>
</body>
</html>

@endsection
