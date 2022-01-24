@extends('layouts.app')
@section('content')

<h1 class="title text-center mb-5">Instructeur toevoegen</h1>

<div class="container sign-up-container mb-5" id="SubFormCon">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="register-instructor" >
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
                    <div id="instructorErrorMsg" class="alert"></div>
                    <input type="hidden" name="roll" id="roll" value="1">
                </div>

                <div class="col-md text-center">
                    <button class="btn mt-3 mb-3 btn-primary">Maak Instructeur aan</button>
                </div>
                @csrf
            </form>
            <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
        </div>
    </div>
    </div>

</div>
@endsection
