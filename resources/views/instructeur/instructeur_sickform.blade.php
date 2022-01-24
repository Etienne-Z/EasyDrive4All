@extends('layouts.app')

@section('content')
<h1 class="title text-center">Ziekmelding voor instructeurs</h1>
<div class="container sign-up-container">
    <div class="row justify-content-center">
        <div class="w-50 text-center contact-form-container">
                <form id="ziekmelden" class="contact-form">
                    <label class="sickform_labels" for="start_date">start datum</label>
                    <input id="start_date" type="date" name="start_date" />
                    <div id="start_dateErrorMsg" class="alert"></div>

                    <label class="sickform_labels" for="end_date">eind datum</label>
                    <input id="end_date" type="date" name="end_date"/>
                    <div id="end_dateErrorMsg" class="alert"></div>

                    <label class="sickform_labels" for="reason"> reden</label>
                    <input type="text" id="reason" name="reason" placeholder="reden"/>
                    <div id="reasonErrorMsg" class="alert"></div>

                    @csrf

                    <button type="submit" class="btn btn-primary">
                        melding maken
                    </button>
                    
                </form>
                <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>

        </div>
    </div>
</div>
@endsection
