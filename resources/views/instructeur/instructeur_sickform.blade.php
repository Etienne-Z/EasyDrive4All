@extends('layouts.app')

@section('content')
<h1 class="title text-center">Ziekmelding voor instructeurs</h1>
<div class="row justify-content-center">
    <div class="w-50 text-center contact-form-container">
            <form action="/instructeur/ziekmelding" class="contact-form" method="POST">

                <label class="sickform_labels" for="start_date">start datum</label>
                <input type="date" name="start_date" />
                <div id="start_dateErrorMsg" class="alert"></div>

                <label class="sickform_labels" for="end_date">eind datum</label>
                <input type="date" name="end_date"/>
                <div id="end_dateErrorMsg" class="alert"></div>

                <label class="sickform_labels" for="reason"> reden</label>
                <input type="text" name="reason" placeholder="reden"/>
                <div id="reasonErrorMsg" class="alert"></div>

                @csrf

                <button type="submit" class="btn btn-primary">
                    melding maken
                </button>
                
            </form>
    </div>
</div>
@endsection
