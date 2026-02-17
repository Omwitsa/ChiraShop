@extends('shared.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-1"></div>
            <div class="col-xs-12 col-sm-10">
                <div class="card landing-card">
                    <div class="card-header">
                        @if (Auth::check())
                            <a style="color: #FFFFFF" href="{{env('APP_ROOT')}}order-summary"> Summary<i></i></a>
                            <div style="text-align: right">
                                <a style="color: #FFFFFF" href="{{env('APP_ROOT')}}logout">logout <i class="ti-arrow-right"></i></a>
                            </div>
                        @endif
                        
                        <div class="text-center"><h3>{{$subCategory->Name}} VARIETIES</h3></div>
                    </div>
                    <div class="card-block">
                        <div class="row home-section">
                            @foreach ($varieties as $index => $variety)
                                <div class="col-xs-12 col-sm-4">
                                    <div class="row type">
                                        <div class="col-xs-12 col-sm-6">
                                            <img src="{{ asset('storage'.env('IMG_STORAGE').$variety->picUrl) }}" alt="Flowers" style="width:100%;">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-center">
                                            <h2>{{$variety->VarietyName}} </h2>
                                            <strong>Minimum Order: {{$variety->MinimumOrder}}</strong><br><br>
                                            @if (Auth::check())
                                                <div class="form-group">
                                                    <a href="{{env('APP_ROOT')}}add-to-cart/{{$variety->param}}" style="color: #FFFFFF" class="btn waves-effect waves-light btn-primary btn-outline-primary" wire:navigate>
                                                    <i class="ti-shopping-cart"></i>Add to Cart</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orderSpecs">
                                                Add
                                            </button> -->

                                            <!-- <div class="modal fade" id="orderSpecs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Specifications</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                            
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
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
