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
                            <form action="/cars_edit" method="post">
                                <input type="hidden" name="id" value="{{$car->id}}">
                                <td>
                                    <select name="Type" id="Type">
                                        <option value="0" {{ ($car->Type == 0 ? "selected":"") }}>Elektrisch</option>
                                        <option value="1" {{ ($car->Type == 1 ? "selected":"") }}>Benzine</option>
                                    </select>
                                </td>
                                <td><input type="text" name="Brand" value="{{$car->Brand}}"></td>
                                <td><input type="text" name="License_plate" value="{{$car->License_plate}}"></td>
                                @csrf
                                <td class="text-center"><button><i class="fas fa-user-edit"></i></button></td>
                            </form>
                            <td class="text-center">
                                    <button id="delete-user_button" class="delete-button" value="{{$car->id}}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div id="wait"><img src="/image/stock/loading.gif" alt="loading-icon"></div>
        </div>

        <div id="dialog-delete-user" class="logout-dialog delete-user" style="display:none">
            <p>Weet u zeker dat u de gebruiker wilt verwijderen?</p>
            <form id="delete-user"  method="post" action="/cars_overview">
                <input type="hidden" name='id' id="deleting-user-id">
                @csrf
                <button class="button-yes inline-block">Ja</button>
            </form>
            <button id="no-close" onclick="document.getElementById('dialog-delete-user').style.display='none'" class="button-cancel">Nee</button>
        </div>
    </div>
    </div>

</div>
@endsection
