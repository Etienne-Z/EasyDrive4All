@extends('layouts.app')

@section('content')
<h1 class="title text-center">Inschrijven</h1>
<div class="container sign-up-container mb-5" id="SubFormCon">

    <div class="row justify-content-center">
        <div class="col-md-8">
        <form id="sign-up-form" method="post" >
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Voornaam:</strong>
                    <div id="voornaamErrorMsg" class="alert"></div>
                    <input type="text" id="first_name" name="first_name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tussenvoegsel:</strong>
                    
                    <input type="text" id="insertion" class="form-control" name="insertion">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Achternaam:</strong>
                    <div id="achternaamErrorMsg" class="alert"></div>
                    <input type="text" id="last_name" class="form-control" name="last_name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email Adres:</strong>
                    <div id="emailErrorMsg" class="alert"></div>
                    <input type="text" id="email" class="form-control" name="email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adres:</strong>
                    <div id="adresErrorMsg" class="alert"></div>
                    <input type="text" id="address" class="form-control" name="address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stad:</strong>
                    <div id="stadErrorMsg" class="alert"></div>
                    <input type="text" id="city" class="form-control" name="city">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Postcode:</strong>
                    <div id="postcodeErrorMsg" class="alert"></div>
                    <input type="text" id="zipcode" class="form-control" name="zipcode">
                </div>
            </div>
            <br><br><br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Inschrijven!</button>
            </div>
        </div> 
        </form>
        <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
        </div>
    </div>
</div>

@endsection
