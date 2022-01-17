@extends('layouts.app')

@section('content')

    @if (Auth::user()->role == 2)
        @include('admin.dashboard')
    @endif
@endsection
