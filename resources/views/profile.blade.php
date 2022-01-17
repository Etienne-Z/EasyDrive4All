@extends('layouts.app')
@section('content')
<h3 class="text-center subtitle-algemene-voorwaarden">MIJN PROFIEL</h3>

<div class="row">
    <div class="col-md"></div>
    <div class="col-md-4 mb-5">
        <table class="profile-overview">
            <tr>
                <th>Voornaam</th>
                <td >{{$user_info["Voornaam"]}}</td>
            </tr>
            <tr>
                <th >Tussenvoegsels</th>
                <td >{{$user_info["Tussenvoegsels"]}}</td>
            </tr>
            <tr>
                <th >Achternaam</th>
                <td >{{$user_info["Achternaam"]}}</td>
            </tr>
            <tr>
                <th >Stad</th>
                <td >{{$user_info["Stad"]}}</td>
            </tr>
            <tr>
                <th >Adres</th>
                <td >{{$user_info["Adres"]}}</td>
            </tr>
            <tr>
                <th >Postcode</th>
                <td >{{$user_info["Postcode"]}}</td>
            </tr>
            <tr>
                <th >E-mail</th>
                <td >{{$user_info["email"]}}</td>
            </tr>
            <tr>
                <th>Lessen tegoed</th>
                <td>{{$user_info["lessen_tegoed"]}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md"></div>
</div>

@endsection
