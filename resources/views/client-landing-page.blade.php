@extends('shared.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
                <div class="card landing-card">
                    <div class="card-header text-center">
                        <h3>Welcome To Chara Beauty</h3>
                    </div>
                    <div class="card-block">
                        <img src="{{env('APP_ROOT')}}assets/images/rosebg.jpg" alt="roses" style="width:100%; height:500px;">
                        <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-lg">Log in</a>
                        <a href="{{env('APP_ROOT')}}guest" class="btn btn-primary btn-lg" wire:navigate>Our Products</a>
                    </div>
                    <div class="card-footer text-center">
                        {{-- <i>For immediate support call</i> &nbsp; 
                        <i class="fa fa-phone" aria-hidden="true"></i> <i>+254 730 779 200 </i> Or <br>
                        email <i class="fa fa-envelope" aria-hidden="true">&nbsp; flowersales@aaagrowers.co.ke
                            </i><br><br> --}}
                        Chara Beauty © {{date('Y')}}
                    </div>
                </div>
            </div>
        </div>
    </div>   
@stop
