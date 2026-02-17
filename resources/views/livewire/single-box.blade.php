<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Single Box</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Single Box</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Single Box</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="creatVariety" class="form-material" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <h4 class="sub-title">Brands</h4>
                                    <div class="form-check form-check-inline">
                                        <input wire:model.change="brands" class="form-check-input" type="radio" id="roses" value="AAA ROSES">
                                        <label class="form-check-label" for="roses">AAA ROSES</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input wire:model.change="brands" class="form-check-input" type="radio" id="bellissima" value="BELLISSIMA">
                                        <label class="form-check-label" for="bellissima">BELLISSIMA</label>
                                    </div>
                                </div>
                            </div><br><hr>

                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group row">
                                        <label class="col-xs-12 col-sm-4 col-form-label">Length</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <select wire:model.live="length" class="form-control" required>
                                                <option disabled value=""></option>
                                                <option value="len40">40 cm</option>
                                                <option value="len50">50 cm</option>
                                                <option value="len60">60 cm</option>
                                                <option value="len70">70 cm</option>
                                                <option value="len80">80 cm</option>
                                                <option value="len90">90 cm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                @foreach ($groupedVarieties as $gv_index => $groupedVariety)
                                    <div class="col-xs-12 col-sm-12">
                                        <h5>{{$groupedVariety->name}}</h5><hr>
                                        <div class="row">
                                            @foreach ($groupedVariety->varieties as $v_index => $variety)
                                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 variety-section">
                                                    <div class="row variety">
                                                        <div class="col-xs-12 col-sm-6 text-center">
                                                            <img src="{{ $variety->picUrl }}" alt="Flowers" style="width:100%;">
                                                            <h5>{{$variety->VarietyName}}</h5>
                                                            <strong>{{$variety->currency}} {{$variety->price}}</strong>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 text-center specs">
                                                            <strong>BoxType: {{$packRate->Name}}</strong><br>
                                                            <strong>Packrate: {{$variety->packrate}}</strong><br>
                                                            <strong>Minimum Order: 10</strong><br>
                                                            <strong>Stems: {{$variety->stems}}</strong><br>
                                                            <strong>Sub-Total: {{$variety->currency}} {{$variety->sub_total}}</strong>
                                                            <div class="form-group">
                                                                <input wire:blur="onEnterQuantity({{ $gv_index }}, {{ $v_index }}, $event.target.value)" wire:key="{{ $variety->id }}" wire:model="groupedVarieties.{{ $gv_index }}.varieties.{{ $v_index }}.quantity" type="number" class="form-control form-control-sm" placeholder="Quantity">
                                                            </div>
                                                            <button wire:click="addToCart({{ $gv_index }}, {{ $v_index }})" wire:key="{{ $variety->id }}" type="button" class="btn btn-primary btn-sm">
                                                                Add to Cart
                                                            </button>
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
                                        </div><br>
                                    </div>
                                @endforeach
                            </div><br>
                            <!-- <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button> -->
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
