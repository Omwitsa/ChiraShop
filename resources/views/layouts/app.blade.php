@extends('shared.master')

@section('content')
    @include('shared.header')
    @if(!auth()->check())
        <script>window.location = "/logout";</script>
    @elseif(auth()->user()->role === 'Admin')
        @include('shared.admin-sidebar')
    @elseif(auth()->user()->role === 'Beauty')
        @include('shared.beauty-sidebar')
    @else
        @include('shared.local-sidebar')
    @endif

    {{ $slot }}
@stop
