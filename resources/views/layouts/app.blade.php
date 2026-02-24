@extends('shared.master')

@section('content')
    @include('shared.header')
    @if(auth()->guard('web')->check())
        @if(auth()->user()->role === 'Admin')
            @include('shared.admin-sidebar')
        @elseif(auth()->user()->role === 'Beauty')
            @include('shared.beauty-sidebar')
        @else
            @include('shared.local-sidebar')
        @endif
    @elseif(auth()->guard('clients')->check())
        @if(auth()->guard('clients')->user()->group === 'Golfers')
            @include('shared.golfers-sidebar')
        @elseif(auth()->guard('clients')->user()->group === 'Fearless')
            @include('shared.Fearless-sidebar')
        @else
            @include('shared.general-sidebar')
        @endif
    @else
        <script>window.location = "/logout";</script>
    @endif

    {{ $slot }}
@stop
