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
                        <form wire:submit="creatProduct" class="form-material" autocomplete="off">
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
                                <label class="col-xs-12 col-sm-2 col-form-label">Upload Picture</label>
                                <div class="col-xs-12 col-sm-4">
                                    <div x-data="{ 
                                        cropper: null,
                                        initCropper() {
                                            this.cropper = new Cropper(this.$refs.img, {
                                                aspectRatio: 1, // Optional: Force a square
                                                viewMode: 1,
                                            });
                                        },
                                        saveCrop() {
                                            let canvas = this.cropper.getCroppedCanvas();
                                            let base64 = canvas.toDataURL('image/png');
                                            @this.set('croppedImage', base64); // Send back to Livewire
                                        }
                                    }">
                                        <input type="file" wire:model="image" @change="setTimeout(() => initCropper(), 500)">

                                        @if($image)
                                            <div class="mt-4" style="max-height: 400px;">
                                                <img x-ref="img" src="{{ $image->temporaryUrl() }}" style="max-width: 100%;">
                                            </div>
                                            
                                            <button type="button" @click="saveCrop" class="bg-blue-500 text-white px-4 py-2 mt-2">
                                                Apply Crop
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                
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
