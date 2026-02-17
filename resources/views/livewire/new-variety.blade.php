

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Variety</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Variety</li>
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
                        <h3 class="card-title">Variety</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="creatVariety" class="form-material" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Variety Name</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="VarietyName" name="VarietyName" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('VarietyName')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Variety Code</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="VarietyCode" name="VarietyCode" type="text" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('VarietyCode')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Flower Type</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model="FlowerType" class="form-control" required>
                                        <option disabled value=""></option>
                                        <option value="Spray">Spray</option>
                                        <option value="Standard">Standard</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('FlowerType')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Category</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model.live="Category" class="form-control" required>
                                        <option disabled value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('Category')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Sub-Category</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select wire:model.live="SubCategory" class="form-control" required>
                                        <option disabled value=""></option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->Name }}">{{ $subCategory->Name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('SubCategory')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Minimum Order</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="MinimumOrder" name="MinimumOrder" type="number" class="form-control" autocomplete="off" required>
                                    <x-input-error :messages="$errors->get('MinimumOrder')" class="mt-2" />
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
                                    @if ($file) 
                                        <img src="{{ $file->temporaryUrl() }}" alt="Flowers" style="width:100%;">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-xs-12 col-sm-2 col-form-label">Color</label>
                                <div class="col-xs-12 col-sm-4">
                                    <input wire:model="Colour" name="Colour" type="color" class="form-control">
                                    <x-input-error :messages="$errors->get('Colour')" class="mt-2" />
                                </div>

                                <label class="col-xs-12 col-sm-2 col-form-label">Alternative(s)</label>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <select wire:model.live="AltVarieties" multiple class="custom-select">
                                            @foreach($varieties as $variety)
                                                <option value="{{ $variety->id }}">{{ $variety->VarietyName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('AltVarieties')" class="mt-2" />
                                </div>
                            </div>
                            
                            <br><button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
