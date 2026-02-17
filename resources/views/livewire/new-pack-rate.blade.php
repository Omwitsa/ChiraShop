


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Packrate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Packrate</li>
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
                        <h3 class="card-title">Packrate</h3>
                    </div>

                    <div class="card-body">
                        <form wire:submit="createPackRate" class="form-material" autocomplete="off">
                            @csrf
                            <!-- Row start -->
                            <div class="row m-b-30">
                                <div class="col-xs-12 col-sm-12">
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#header" role="tab">Packrate</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#lineItem" role="tab">Packrate Line</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="header" role="tabpanel">
                                            <div class="form-group row">
                                                <label class="col-xs-12 col-sm-2 col-form-label">Packrate</label>
                                                <div class="col-xs-12 col-sm-4">
                                                    <input wire:model="Name" name="Name" type="text" class="form-control" autocomplete="off" required>
                                                    <x-input-error :messages="$errors->get('Name')" class="mt-2" />
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
                                                            <th>Length 40</th>
                                                            <th>Length 50</th>
                                                            <th>Length 60</th>
                                                            <th>Length 70</th>
                                                            <th>Length 80</th>
                                                            <th>Length 90</th>
                                                            <th></th>
                                                            
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($packrateLines as $index => $item)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration}}</th>
                                                                <td><select wire:model="packrateLines.{{ $index }}.variety" class="form-control" required>
                                                                    <option disabled value=""></option>
                                                                    @foreach($varieties as $variety)
                                                                        <option value="{{ $variety->VarietyName }}">{{ $variety->VarietyName }}</option>
                                                                    @endforeach
                                                                </select></td>

                                                                <td><input type="text" wire:model="packrateLines.{{ $index }}.len40" class="form-control"></td>
                                                                <td><input type="text" wire:model="packrateLines.{{ $index }}.len50" class="form-control"></td>
                                                                <td><input type="text" wire:model="packrateLines.{{ $index }}.len60" class="form-control"></td>
                                                                <td><input type="text" wire:model="packrateLines.{{ $index }}.len70" class="form-control"></td>
                                                                <td><input type="text" wire:model="packrateLines.{{ $index }}.len80" class="form-control"></td>
                                                                <td><input type="text" wire:model="packrateLines.{{ $index }}.len90" class="form-control"></td>
                                                                <td><a class="btn btn-warning btn-sm waves-effect waves-light" wire:click="removePackRateLine({{ $index }})">Remove</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <a class="btn btn-info waves-effect waves-light" wire:click="addPackRateLine">Add</a>
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
