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
                                    <div class="tab-content card-block"><br>
                                        <div class="tab-pane active" id="header" role="tabpanel">
                                            <div class="form-group row">
                                                <label class="col-xs-12 col-sm-2 col-form-label">Description</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <input wire:model="name" name="name" type="text" class="form-control" disabled>
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>

                                                <label class="col-xs-12 col-sm-2 col-form-label">Category</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <select wire:model.live="clientCategoryId" class="form-control" disabled>
                                                        <option disabled value=""></option>
                                                        @foreach($clientCategories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('clientCategoryId')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xs-12 col-sm-2 col-form-label">Effective Date</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <input wire:model="startDate" name="startDate" type="date" class="form-control" disabled>
                                                    <x-input-error :messages="$errors->get('startDate')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="lineItem" role="tabpanel">
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>Product</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($priceLines as $index => $line)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration}}</th>
                                                                <td>{{ $line->category }}</td>
                                                                <td>{{ $line->name }}</td>
                                                                <td>{{ $line->price }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
