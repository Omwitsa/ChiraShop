<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
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
                        <h3 class="card-title">Order</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <button wire:click="print"  wire:loading.attr="disabled" class="btn btn-primary waves-effect waves-light">Print</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <div class="row text-center">
                            <div class="col-sm-12">
                                <h3>{{ $order->name }}</3>
                                <h6>{{ $order->orderDate }}</h6>
                            </div>
                        </div><hr>

                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Line Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $line)
                                    <tr>
                                        <!-- <th scope="row">{{ $loop->iteration}}</th> -->
                                        <td>{{ $line->name }}</td>
                                        <td>{{ $line->unit_price }}</td>
                                        <td>{{ $line->orderQuantity }}</td>
                                        <td>{{ $line->lineTotal }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="3">Total</td>
                                    <td>{{ $order->amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
