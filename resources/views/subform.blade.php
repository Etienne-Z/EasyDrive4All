@extends('layouts.app')

@section('content')
<div class="container" id="SubFormCon">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="post" action="{{url('inschrijven/versturen')}}">
            @csrf

            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Voornaam:</strong>
                    <input type="text" name="first_name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tussenvoegsel:</strong>
                    <input type="text" class="form-control" name="insertion">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Achternaam:</strong>
                    <input type="text" class="form-control" name="last_name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email Adres:</strong>
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adres:</strong>
                    <input type="text" class="form-control" name="address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stad:</strong>
                    <input type="text" class="form-control" name="city">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Postcode:</strong>
                    <input type="text" class="form-control" name="zipcode">
                </div>
            </div>
            <br><br><br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Inschrijven!</button>
            </div>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection
