@extends('layouts.app')
@section('content')


<div class="container">
<h3 class="text-center subtitle-algemene-voorwaarden">{{$announcement_info["title"]}}</h3>
    <div class="col-md"></div>
    <div class="col-md mb-5 ">
        <table class="announcement-show AnnounceCol">
            <tr>
                <th >Type Mededeling</th>
                @if($announcement_info["role"] === 0)
                <td >Leerling</td>
                @else
                <td>Instructeur</td>
                @endif
            </tr>
            <tr>
                <th>Mededeling</th>
                <td class="announcement-show-block">{{$announcement_info["description"]}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md"></div>
</div>

@endsection