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
        @include('shared.golfers-sidebar')
    @else
        <script>window.location = "/logout";</script>
    @endif

    {{ $slot }}
@stop
