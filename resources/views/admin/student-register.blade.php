@extends('layouts.app')
@section('content')

<h1 class="title text-center mb-5">Leerling toevoegen</h1>

<div class="container sign-up-container mb-5" id="SubFormCon">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/student_register" id="register"  method="POST">
                <div class="col-md">
                    <strong>Voornaam:</strong>
                    <div id="firstNameErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3"  name="first_name" id="first_name" value="{{old('first_name')}}">
                </div>
                <div class="col-md">
                    <strong>Tussenvoegsel:</strong>
                    <div id="insertionErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="insertion" id="insertion"  value="{{old('insertion')}}">
                </div>
                <div class="col-md">
                    <strong>Achternaam:</strong>
                    <div id="lastNameErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="last_name" id="last_name"  value="{{old('last_name')}}">
                </div>
                <div class="col-md">
                    <strong>E-Mail:</strong>
                    <div id="emailErrorMsg" class="alert"></div>
                    
                    <input type="text" class="form-control mt-3 mb-3" name="email" id="email"  value="{{old('email')}}">
                </div>
                <div class="col-md">
                    <strong>Adres:</strong>
                    <div id="addressErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="address" id="address"  value="{{old('address')}}">
                </div>
                <div class="col-md">
                    <strong>Stad:</strong>
                    <div id="cityErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="city" id="city" value="{{old('city')}}">
                </div>
                <div class="col-md">
                    <strong>Postcode:</strong>
                    <div id="zipcodeErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="zipcode" id="zipcode"  value="{{old('zipcode')}}">
                </div>
                <div class="col-md">
                    <input type="hidden" name="roll" id="roll" value="0">
                </div>
                <div class="col-md">
                    <strong>Instructeur:</strong>
                    <div id="instructorErrorMsg" class="alert"></div>
                    <select name="instructor" id="instructor" class="form-control mb-3" value="Kies de instructeur">
                        @foreach ($instructors as $instructor)
                            <option value="{{$instructor->id}}">{{$instructor->first_name }} {{$instructor->insertion}} {{ $instructor->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md text-center">
                    <button class="btn mt-3 mb-3 btn-primary">Maak student aan</button>
                </div>
                @csrf
            </form>
            <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
        </div>
    </div>
    </div>

</div>
@endsection