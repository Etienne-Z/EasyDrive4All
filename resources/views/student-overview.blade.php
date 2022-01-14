@extends('layouts.app')

@section('content')
        <h1 class="title text-center">Leerlingen </h1>
        <div class="button-add-user">Leerling toevoegen</div>
    <div class="container">
        <div class="row">
            <table class="overview">
                <thead>
                        <td>Voornaam</td>
                        <td>Achternaam</td>
                        <td>Telefoonnummer</td>
                        <td>Aanpassen</td>
                        <td>Verwijderen</td>
                </thead>
                <tbody>
                    <tr>
                        <td>Mert</td>
                        <td>Van Dalen</td>
                        <td>0546-889911</td>
                        <td>U</td>
                        <td>DELete</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
