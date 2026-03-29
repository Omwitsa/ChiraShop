<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                        <h3 class="card-title">Product</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="UpdateProduct" class="form-material" autocomplete="off">
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
                                <label class="col-xs-12 col-sm-2 col-form-label">Category <span class="required">*</span></label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="category" class="form-control" required>
                                        <option disabled value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Barcode</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="barcode" name="barcode" type="text" class="form-control" autocomplete="off">
                                    <x-input-error :messages="$errors->get('barcode')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Origin</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="origin" name="origin" type="text" class="form-control" autocomplete="off">
                                    <x-input-error :messages="$errors->get('origin')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Volume</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="volume" name="volume" type="text" class="form-control" autocomplete="off">
                                    <x-input-error :messages="$errors->get('volume')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Reason To Love</label>
                                <div class="col-xs-12 col-sm-4">
                                    <textarea wire:model="reasonToLove" name="reasonToLove" rows="3" class="form-control" autocomplete="off"></textarea>
                                    <x-input-error :messages="$errors->get('reasonToLove')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Description</label>
                                <div class="col-xs-12 col-sm-4">
                                    <textarea wire:model="description" name="description" rows="3" class="form-control" autocomplete="off"></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">OL Factory Notes</label>
                                <div class="col-xs-12 col-sm-4">
                                    <textarea wire:model="olFactoryNotes" name="olFactoryNotes" rows="3" class="form-control" autocomplete="off"></textarea>
                                    <x-input-error :messages="$errors->get('olFactoryNotes')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Ingredients</label>
                                <div class="col-xs-12 col-sm-4">
                                    <textarea wire:model="ingredients" name="ingredients" rows="3" class="form-control" autocomplete="off"></textarea>
                                    <x-input-error :messages="$errors->get('ingredients')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">How To Use</label>
                                <div class="col-xs-12 col-sm-4">
                                    <textarea wire:model="howToUse" name="howToUse" rows="3" class="form-control" autocomplete="off"></textarea>
                                    <x-input-error :messages="$errors->get('howToUse')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Claims</label>
                                <div class="col-xs-12 col-sm-4">
                                    <textarea wire:model="claims" name="claims" rows="3" class="form-control" autocomplete="off"></textarea>
                                    <x-input-error :messages="$errors->get('claims')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Shipment Time</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="shipmentTime" name="shipmentTime" type="text" class="form-control" autocomplete="off">
                                    <x-input-error :messages="$errors->get('shipmentTime')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Upload Picture</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="file" type="file" class="form-control">
                                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-1">
                                    <div wire:loading wire:target="file"> Uploading... </div>
                                    @if($file)         
                                        <img src="{{ $file->temporaryUrl() }}" alt="Beauty" style="width:100%;">
                                    @else
                                        <img src="{{ asset('storage'.env('IMG_STORAGE').$product->picUrl) }}" alt="Beauty" style="width:100%;">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-check form-check-inline">
                                    <input wire:model="active" class="form-check-input" type="checkbox" id="active">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-check form-check-inline">
                                    <input wire:model="inStock" class="form-check-input" type="checkbox" id="inStock">
                                    <label class="form-check-label" for="inStock">In Stock</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-check form-check-inline">
                                    <input wire:model="isAddOn" class="form-check-input" type="checkbox" id="isAddOn">
                                    <label class="form-check-label" for="isAddOn">Is Add On</label>
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
