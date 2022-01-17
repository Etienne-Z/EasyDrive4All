@extends('layouts.app')

@section('content')
<h1 class="title text-center">Ziekmelding voor instructeurs</h1>
<div>
    <form>
        <table>  

            <tr><td><label for="start_date">start datum</label></td>
            <td><input type="date" id="start_date" value="date("d/m/y")"/></td></tr>
            <tr><td><label for="end_date">eind datum</label></td>
            <td><input type="date" id="end_date" value="date("d/m/y")"/></td></tr>    
            <tr><td><label> reden</label></td>
            <td><input type="text" id="reason" placeholder="reden" /></td></tr>
        </table>
    </form>
</div>
@endsection
