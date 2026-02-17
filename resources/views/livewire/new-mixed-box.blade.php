<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mixed Box</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Mixed Box</li>
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
                        <h3 class="card-title">Mixed Box</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="createMixedBox" class="form-material" autocomplete="off">
                            @csrf
                            <!-- Row start -->
                            <div class="row m-b-30">
                                <div class="col-xs-12 col-sm-12">
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#header" role="tab">Header</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#lineItem" role="tab">Line</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="header" role="tabpanel">
                                            <div class="form-group row">
                                                <label class="col-xs-12 col-sm-2 col-form-label">Mixed Box</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <input wire:model="name" name="name" type="text" class="form-control" autocomplete="off" required>
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>

                                                <label class="col-xs-12 col-sm-2 col-form-label"></label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <select wire:model="Category" class="form-control" required>
                                                        <option disabled value=""></option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('Category')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xs-12 col-sm-2 col-form-label">Length</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <select wire:model="length" class="form-control" required>
                                                        <option disabled value=""></option>
                                                        <option value="40">40 cm</option>
                                                        <option value="50">50 cm</option>
                                                        <option value="60">60 cm</option>
                                                        <option value="70">70 cm</option>
                                                        <option value="80">80 cm</option>
                                                        <option value="90">90 cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="lineItem" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Variety</th>
                                                            <th>Stems</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($LineItems as $index => $item)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration}}</th>
                                                                <td><select wire:model="LineItems.{{ $index }}.variety" class="form-control" required>
                                                                    <option disabled value=""></option>
                                                                    @foreach($varieties as $variety)
                                                                        <option value="{{ $variety->VarietyName }}">{{ $variety->VarietyName }}</option>
                                                                    @endforeach
                                                                </select></td>

                                                                <td><input type="text" wire:model="LineItems.{{ $index }}.stems" class="form-control" placeholder="Stems"></td>
                                                                <td><a class="btn btn-warning btn-sm waves-effect waves-light" wire:click="removeLineItems({{ $index }})">Remove</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <a class="btn btn-info waves-effect waves-light" wire:click="addBox">Add</a>
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
