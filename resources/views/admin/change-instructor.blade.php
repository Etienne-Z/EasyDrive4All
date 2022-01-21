@extends('layouts.app')

@section('content')
    <h1 class="title text-center">Instructeur veranderen</h1>
    <div class="container sign-up-container mb-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3 mt-5">
                <form id="changeInstructor" >
                        <div class="col-md">
                            <strong>Voornaam:</strong><br>
                            <div id="firstNameErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="first_name" name="first_name" value="{{$instructor->first_name}}">
                        </div>
                        <div class="col-md">
                            <strong>Tussenvoegsel:</strong><br>
                            <div id="insertionErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="insertion" name="insertion" value="{{$instructor->insertion}}">
                        </div>
                        <div class="col-md">
                            <strong>Achternaam:</strong><br>
                            <div id="lastNameErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="last_name" name="last_name" value="{{$instructor->last_name}}">
                        </div>
                        <div class="col-md">
                            <strong>E-mail:</strong><br>
                            <div id="emailErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="email" name="email" value="{{$instructor->email}}">
                        </div>
                        <div class="col-md">
                            <strong>Stad:</strong><br>
                            <div id="cityErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="city" name="city" value="{{$instructor->city}}">
                        </div>
                        <div class="col-md">
                            <strong>Adres:</strong><br>
                            <div id="addressErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="address" name="address" value="{{$instructor->address}}">
                        </div>
                        <div class="col-md">
                            <strong>Postcode:</strong><br>
                            <div id="zipcodeErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="zipcode" name="zipcode" value="{{$instructor->zipcode}}">
                        </div>
                        <div class="col-md">
                            <strong>Ziek?:</strong>
                            <div id="sickErrorMsg" class="alert"></div>
                            <select name="sick" id="sick" class="form-control mb-3">
                                <option value="0">Nee</option>
                                <option value="1">Ja</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <strong>Aantal keren ziek:</strong><br>
                            <div id="amount_sickErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="amount_sick" name="amount_sick" value="{{$instructor->amount_sick}}">
                        </div>
                        <input type="hidden" id="user_id" name="id" value="{{ $instructor->id }}">
                        <div class="col-md text-center">
                            @csrf
                            <button class="btn-primary btn mt-5">Aanpassen</button>
                        </div>
                </form>
                <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
            </div>
        </div>
    </div>

@endsection