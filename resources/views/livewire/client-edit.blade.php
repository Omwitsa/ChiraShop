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
                        <form wire:submit="UpdateClient" class="form-material" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Name <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="name" name="name" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Code <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="code" name="code" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Group <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="group" class="form-control" required>
                                        <option disabled value=""></option>
                                        @foreach(\App\Constants\Enums\ClientGroups::cases() as $group)
                                            <option value="{{ $group->value }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('group')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Category <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="categoryId" class="form-control" required>
                                        <option disabled value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('categoryId')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Password <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input  wire:model="password" name="password" type="password" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Confirm Password <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Email Recepients <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="emailRecepients" name="emailRecepients" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('emailRecepients')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-check form-check-inline">
                                    <input wire:model="active" class="form-check-input" type="checkbox" id="active">
                                    <label class="form-check-label" for="active">Active</label>
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
