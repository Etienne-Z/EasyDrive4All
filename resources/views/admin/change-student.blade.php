@extends('layouts.app')

@section('content')
    <h1 class="title text-center">Student veranderen</h1>
    <div class="container sign-up-container mb-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3 mt-5">
                <form id="changeStudent">
                        <div class="col-md">
                            <strong>Voornaam:</strong><br>
                            <div id="firstNameErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="first_name" name="first_name" value="{{$user->first_name}}">
                        </div>
                        <div class="col-md">
                            <strong>Tussenvoegsel:</strong><br>
                            <div id="insertionErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="insertion" name="insertion" value="{{$user->insertion}}">
                        </div>
                        <div class="col-md">
                            <strong>Achternaam:</strong><br>
                            <div id="lastNameErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="last_name" name="last_name" value="{{$user->last_name}}">
                        </div>
                        <div class="col-md">
                            <strong>E-mail:</strong><br>
                            <div id="emailErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="email" name="email" value="{{$user->email}}">
                        </div>
                        <div class="col-md">
                            <strong>Stad:</strong><br>
                            <div id="cityErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="city" name="city" value="{{$user->city}}">
                        </div>
                        <div class="col-md">
                            <strong>Adres:</strong><br>
                            <div id="addressErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="address" name="address" value="{{$user->address}}">
                        </div>
                        <div class="col-md">
                            <strong>Postcode:</strong><br>
                            <div id="zipcodeErrorMsg" class="alert"></div>
                            <input type="text" class="form-control mt-3 mb-3" id="zipcode" name="zipcode" value="{{$user->zipcode}}">
                        </div>
                        <div class="col-md">
                            <strong>Instructeur:</strong><br>
                            <select name="instructor" id="instructor" class="form-control mb-3" value="Kies de instructeur">
                                @foreach ($instructors as $instructor)
                                    <option value="{{$instructor->id}}" @isset($instructor_has_user) @if ($instructor->id == $instructor_has_user) selected @endif @endisset >{{$instructor->first_name }} {{$instructor->insertion}} {{ $instructor->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="user_id" name="id" value="{{ $user->id }}">
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