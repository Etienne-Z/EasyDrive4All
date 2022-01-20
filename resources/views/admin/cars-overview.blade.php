@extends('layouts.app')
@section('content')

<div class="overview_header">
    <h1 class="title text-center">Wagenpark</h1>
    <a href="/cars_register" class="button-add-user">Auto toevoegen</a>
</div>

<div class="container sign-up-container car-overview-container mb-5" id="SubFormCon">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="overview">
                <thead>
                        <td>Type</td>
                        <td>Merk</td>
                        <td>Kentekenplaat</td>
                        <td>Aanpassen</td>
                        <td>Verwijderen</td>
                </thead>
                <tbody>
                    @foreach ($cars as $car )
                        <tr>
                            <td>{{$car->Type}}</td>
                            <td>{{$car->Brand}}</td>
                            <td>{{$car->License_plate}}</td>
                            <td class="text-center"><i class="fas fa-user-edit"></i></td>
                            <td class="text-center">
                                    <button id="delete-user_button" class="delete-button" value="{{$car->id}}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
        </div>
    </div>
    </div>

</div>
@endsection
