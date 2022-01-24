@extends('layouts.app')
@section('content')
<h1 class="title text-center mb-5">Mededeling aanmaken</h1>

<div class="container sign-up-container mb-5" id="SubFormCon">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="createAnnouncement">
                <div class="col-md">
                    <strong>Titel:</strong>
                    <div id="titleErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3"  name="title" id="title" value="{{old('title')}}">
                </div>
                <div class="col-md">
                    <strong>Mededeling:</strong>
                    <div id="descriptionErrorMsg" class="alert"></div>
                    <input type="text" class="form-control mt-3 mb-3" name="description" id="description"  value="{{old('description')}}">
                </div>
                <div class="col-md">
                    <strong>Type Mededeling:</strong>
                    <div id="roleErrorMsg" class="alert"></div>
                    <select name="role" id="role" class="form-control mb-3" value="Kies de type mededeling">
                            <option value="0">Studenten</option>
                            <option value="1">Instructeurs</option>
                    </select>
                </div>
                <div class="col-md text-center">
                    <button class="btn mt-3 mb-3 btn-primary">Maak mededeling aan</button>
                </div>
                @csrf
            </form>
            <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
        </div>
    </div>
    </div>
</div>
@endsection