@component('mail::message')
Beste {{$request->first_name}} {{$request->insertion}} {{$request->last_name}},

Hierbij uw inlog gegevens

E-Mail: {{$request->email}}
Wachtwoord: {{$password}}


The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
