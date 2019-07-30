@extends('adminlte::page')

@section('title', 'NewsHub')

@section('content_header')
    @include('flash-message')

    <h1>
        @php
            $time = date('H', time());
            $user = Str::before(Auth::user()->name, ' ');
        @endphp

        @if( ($time >= 6) && ($time < 12) )
            Bom dia, {{ $user }}!
        @elseif( ($time >= 12) && ($time < 18) )
            Boa tarde, {{ $user }}!
        @else
            Boa noite, {{ $user }}!
        @endif
    </h1>
@stop

@section('content')
    <p>Você está conectado!</p>
@stop
