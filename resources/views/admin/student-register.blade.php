@extends('layouts.app')
@section('content')

<h1 class="title text-center mb-5">Leerling toevoegen</h1>

<div class="container sign-up-container mb-5" id="SubFormCon">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/student_register" id="register"  method="POST">
                <div class="col-md">
                    <input type="text" class="form-control mt-3 mb-3"  name="first_name" id="last_name" placeholder="Voornaam">
                </div>
                <div class="col-md">
                    <input type="text" class="form-control mt-3 mb-3" name="insertion" id="insertion" placeholder="Tussenvoegsel">
                </div>
                <div class="col-md">
                    <input type="text" class="form-control mt-3 mb-3" name="last_name" id="last_name" placeholder="Achternaam">
                </div>
                <div class="col-md">
                    <input type="text" class="form-control mt-3 mb-3" name="email" id="email" placeholder="E-mail">
                </div>
                <div class="col-md">
                    <input type="text" class="form-control mt-3 mb-3" name="address" id="address" placeholder="Adres">
                </div>
                <div class="col-md">
                    <input type="text" class="form-control mt-3 mb-3" name="city" id="city" placeholder="Stad">
                </div>
                <div class="col-md">
                    <input type="text" class="form-control mt-3 mb-3" name="zipcode" id="zipcode" placeholder="Postcode">
                </div>
                <div class="col-md">
                    <input type="hidden" name="roll" id="roll" value="0">
                </div>
                <div class="col-md">
                    <select name="instructor" id="instructor" class="form-control mb-3" value="Kies de instructeur">
                        <option disabled selected >Kies de instructeur</option>
                        @foreach ($instructors as $instructor)
                            <option value="{{$instructor->id}}">{{$instructor->first_name }} {{$instructor->insertion}} {{ $instructor->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md text-center">
                    <button class="btn btn-primary">Maak student aan</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
    </div>

</div>
@endsection