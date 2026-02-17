<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                        <h3 class="card-title">Orders</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Id</th>
                                    <th>Date Created</th>
                                    <th>Receiving Date</th>
                                    <th>Lpo No.</th>
                                    <th>Status</th>
                                    <th>Farm</th>
                                    <th>Type</th>
                                    <th>Drop Off Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration}}</th>
                                        <td>{{ $order->ClientId }}</td>
                                        <td>{{ $order->DateCreated }}</td>
                                        <td>{{ $order->ReceivingDate }}</td>
                                        <td>{{ $order->LpoNo }}</td>
                                        <td>{{ $order->Status }}</td>
                                        <td>{{ $order->Farm }}</td>
                                        <td>{{ $order->Type }}</td>
                                        <td>{{ $order->DropOffId }}</td>
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
