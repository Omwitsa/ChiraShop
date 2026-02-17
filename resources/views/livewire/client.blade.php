<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clients</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Clients</li>
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
                        <h3 class="card-title">Clients</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{ url('new-client') }}" class="btn btn-primary waves-effect waves-light">New</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Drop Off</th>
                                    <th>Currency</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration}}</th>
                                        <td>{{ $client->Name }}</td>
                                        <td>{{ $client->Code }}</td>
                                        <td>{{ $client->Type }}</td>
                                        <td>{{ $client->DropOff }}</td>
                                        <td>{{ $client->Currency }}</td>
                                        <td>
                                            <button wire:click="edit({{ $client->id }})" wire:key="{{ $client->id }}" type="button" class="btn btn-primary btn-sm waves-effect waves-light">Edit</button>|
                                            <button wire:click="delete({{ $client->id }})" wire:key="{{ $client->id }}" wire:confirm="Are you sure you want to delete?" type="button" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
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
