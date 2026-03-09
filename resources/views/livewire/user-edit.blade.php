<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                        <h3 class="card-title">User</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="UpdateUser" class="form-material" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Usercode<span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    {{-- @if($isAdmin)
                                        <input  wire:model="usercode" name="usercode" type="text" class="form-control" autocomplete="off" required>
                                    @else
                                        <select wire:model="usercode" class="form-control" required>
                                            <option disabled value=""></option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->ClientCode }}">{{ $client->ClientName }}</option>
                                            @endforeach
                                        </select>
                                    @endif --}}
                                    <input  wire:model="usercode" name="usercode" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('usercode')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Role<span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="role" class="form-control" required>
                                        <option disabled value=""></option>
                                        @foreach(\App\Constants\Roles::cases() as $role)
                                            <option value="{{ $role->value }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('FlowerType')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Password<span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input  wire:model="password" name="password" type="password" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Confirm Password<span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Email<span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input  wire:model="email" name="email" type="email" class="form-control">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                @if(auth()->user()->usercode == 'Admin')
                                    <div class="form-check form-check-inline">
                                        <input wire:model.live="isAdmin" class="form-check-input" type="checkbox" id="isAdmin">
                                        <label class="form-check-label" for="isAdmin">Admin</label>
                                    </div>
                                @endif
                            </div> --}}

                            <div class="form-group row">
                                <div class="form-check form-check-inline">
                                    <input wire:model="active" class="form-check-input" type="checkbox" id="active">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div><br>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
