<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Drop Offs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Drop Offs</li>
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
                        <h3 class="card-title">Drop Offs</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{ url('new-dropoff') }}" class="btn btn-primary waves-effect waves-light">New</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($dropoffs as $dropoff)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration}}</th>
                                        <td>{{ $dropoff->name }}</td>
                                        <td>{{ $dropoff->active }}</td>
                                        <td>
                                            <button wire:click="edit({{ $dropoff->id }})" wire:key="{{ $dropoff->id }}" type="button" class="btn btn-primary btn-sm waves-effect waves-light">Edit</button>|
                                            <button wire:click="delete({{ $dropoff->id }})" wire:key="{{ $dropoff->id }}" wire:confirm="Are you sure you want to delete?" type="button" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
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
