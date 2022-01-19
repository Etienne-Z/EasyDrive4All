@component('mail::message')
Beste {{$request->first_name}} {{$request->insertion}} {{$request->last_name}},

Hierbij uw inlog gegevens

E-Mail: {{$request->email}} <br>
Wachtwoord: {{$password}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
