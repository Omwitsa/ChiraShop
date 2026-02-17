<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Varieties</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Varieties</li>
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
                        <h3 class="card-title">Varieties</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{ url('new-variety') }}" class="btn btn-primary waves-effect waves-light">New</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Variety Name</th>
                                    <th>Variety Code</th>
                                    <th>Flower Type</th>
                                    <th>Colour</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($varieties as $variety)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration}}</th>
                                        <td>{{ $variety->VarietyName }}</td>
                                        <td>{{ $variety->VarietyCode }}</td>
                                        <td>{{ $variety->FlowerType }}</td>
                                        <td>{{ $variety->Colour }}</td>
                                        <td>{{ $variety->Active }}</td>
                                        <td>
                                            <button wire:click="edit({{ $variety->id }})" wire:key="{{ $variety->id }}" type="button" class="btn btn-primary btn-sm waves-effect waves-light">Edit</button>|
                                            <button wire:click="delete({{ $variety->id }})" wire:key="{{ $variety->id }}" wire:confirm="Are you sure you want to delete?" type="button" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
