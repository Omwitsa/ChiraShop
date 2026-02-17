<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Price</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Price</li>
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
                        <h3 class="card-title">Price</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="createPrice" class="form-material" autocomplete="off">
                            @csrf
                            <!-- Row start -->
                            <div class="row m-b-30">
                                <div class="col-xs-12 col-sm-12">
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#header" role="tab">Price</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#lineItem" role="tab">Price Line</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="header" role="tabpanel">
                                            <div class="form-group row">
                                                <label class="col-xs-12 col-sm-2 col-form-label">Name</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <input wire:model="Name" name="Name" type="text" class="form-control" autocomplete="off" required>
                                                    <x-input-error :messages="$errors->get('Name')" class="mt-2" />
                                                </div>

                                                <label class="col-xs-12 col-sm-2 col-form-label">Currency</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <input wire:model="Currency" name="Currency" type="text" class="form-control" autocomplete="off" required>
                                                    <x-input-error :messages="$errors->get('Currency')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="lineItem" role="tabpanel">
                                            <div>
                                                @foreach($priceLines as $index => $item)
                                                    <div>
                                                        <select wire:model="priceLines.{{ $index }}.variety" required>
                                                            <option disabled value=""></option>
                                                            @foreach($varieties as $variety)
                                                                <option value="{{ $variety->VarietyName }}">{{ $variety->VarietyName }}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="text" wire:model="priceLines.{{ $index }}.len40" placeholder="length 40">
                                                        <input type="text" wire:model="priceLines.{{ $index }}.len50" placeholder="length 50">
                                                        <input type="text" wire:model="priceLines.{{ $index }}.len60" placeholder="length 60">
                                                        <input type="text" wire:model="priceLines.{{ $index }}.len70" placeholder="length 70">
                                                        <input type="text" wire:model="priceLines.{{ $index }}.len80" placeholder="length 80">
                                                        <input type="text" wire:model="priceLines.{{ $index }}.len90" placeholder="length 90">
                                                        <a class="btn btn-warning btn-sm waves-effect waves-light" wire:click="removePriceLine({{ $index }})">Remove</a>
                                                    </div><hr>
                                                @endforeach
                                                
                                                <a class="btn btn-info waves-effect waves-light" wire:click="addPriceLine">Add</a>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
