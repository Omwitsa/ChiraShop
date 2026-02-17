@extends('shared.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
                <div class="card landing-card">
                    <div class="card-header">
                        @if (Auth::check())
                            <a style="color: #FFFFFF" href="{{env('APP_ROOT')}}order-summary"> Summary<i></i></a>
                            <div style="text-align: right">
                                <a style="color: #FFFFFF" href="{{env('APP_ROOT')}}logout">logout <i class="ti-arrow-right"></i></a>
                            </div>
                        @endif
                        
                        <div class="text-center"><h3>CATEGORIES</h3></div>
                    </div>
                    <div class="card-block">
                        <!-- <img src="assets/images/rosebg.jpg" alt="roses" style="width:100%; height:500px;"> -->
                        <!-- <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-lg">Log in</a> -->
                        <div class="row home-section">
                            @foreach ($categories as $index => $category)
                                <div class="col-xs-12 col-sm-6">
                                    <div class="row type">
                                        <div class="col-xs-12 col-sm-6">
                                            <img src="{{ asset('storage'.env('IMG_STORAGE').$category->picUrl) }}" alt="Flowers" style="width:100%;">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-center">
                                            <h1>{{$category->name}}</h1><br>
                                            @if($category->name =='MIXED BOX')  
                                                <a href="{{env('APP_ROOT')}}mixed-box" style="color: #FFFFFF" class="btn waves-effect waves-light btn-primary btn-outline-primary">
                                                <i class="ti-shopping-cart"></i>View</a>       
                                            @else
                                                <a href="{{env('APP_ROOT')}}sub-category/{{$category->param}}" style="color: #FFFFFF" class="btn waves-effect waves-light btn-primary btn-outline-primary" wire:navigate>
                                                <i class="ti-shopping-cart"></i>View</a>         
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <i>For immediate support call</i> &nbsp; 
                        <i class="fa fa-phone" aria-hidden="true"></i> <i>+254 730 779 200 </i> Or <br>
                        email <i class="fa fa-envelope" aria-hidden="true">&nbsp; flowersales@aaagrowers.co.ke</i><br><br>
                        AAA IT TEAM © {{date('Y')}}
                    </div>
                </div>
            </div>
        </div>
    </div>  
@stop
