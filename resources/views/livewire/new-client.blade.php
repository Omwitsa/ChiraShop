<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Client</li>
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
                        <h3 class="card-title">Client</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="creatClient" class="form-material" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Name</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="Name" name="Name" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('Name')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Code</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="Code" name="Code" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('Code')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Type</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="Type" class="form-control" required>
                                        <option disabled value=""></option>
                                        <option value="Retailer">Retailer</option>
                                        <option value="Wholesaler">Wholesaler</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('Type')" class="mt-2" />
                                </div>

                               <label class="col-xs-12 col-sm-2 col-form-label">Drop Off</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="DropOff" class="form-control" required>
                                        <option disabled value=""></option>
                                        @foreach($dropoffs as $dropoff)
                                            <option value="{{ $dropoff->name }}">{{ $dropoff->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('DropOff')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Password</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input  wire:model="password" name="password" type="password" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Country</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="Country" class="form-control">
                                        <option disabled value=""></option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('DropOff')" class="mt-2" />
                                </div>
                            
                                <label class="col-xs-12 col-sm-2 col-form-label">Email Recepients</label>
                                <div class="col-xs-12 col-sm-4">
                                    <textarea wire:model="EmailRecepients" name="EmailRecepients" rows="3" class="form-control"></textarea>
                                    <x-input-error :messages="$errors->get('EmailRecepients')" class="mt-2" />
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
