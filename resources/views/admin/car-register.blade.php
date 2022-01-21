@extends('layouts.app')
@section('content')

<h1 class="title text-center mb-5">Auto toevoegen</h1>

<div class="container sign-up-container mb-5" id="SubFormCon">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="register-car" >
                <div class="col-md">
                    <strong>Type:</strong>
                    <div id="TypeErrorMsg" class="alert"></div>
                    <select class="form-select" name="Type" id="Type">
                        <option value="0" {{ (Request::old("Type") == 0 ? "selected":"") }}>Elektrisch</option>
                        <option value="1" {{ (Request::old("Type") == 1 ? "selected":"") }}>Benzine</option>
                      </select>
                </div>
                <div class="col-md">
                    <strong>Merk:</strong>
                    <div id="BrandErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="Brand" id="Brand"  value="{{old('Brand')}}">
                </div>
                <div class="col-md">
                    <strong>Kentekenplaat:</strong>
                    <div id="License_plateErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="License_plate" id="License_plate"  value="{{old('License_plate')}}">
                </div>

                <div class="col-md text-center">
                    <button class="btn mt-3 mb-3 btn-primary">Maak auto aan</button>
                </div>
                @csrf
            </form>
            <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
        </div>
    </div>
    </div>

</div>
@endsection
