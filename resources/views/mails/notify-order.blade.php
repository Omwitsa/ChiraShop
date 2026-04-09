<div class="card">
    <div class="card-header text-center">
        <h3 class="card-title">{{ $data->clientName }}</h3>
    </div>

    <div class="card-body table-responsive p-0">
        <table border="1" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price (KSH)</th>
                    <th>Sub Total (KSH)</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data->lines as $line)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $line->code }}</td>
                        <td>{{ $line->name }}</td>
                        <td>{{ $line->quantity }}</td>
                        <td>{{ $line->price }}</td>
                        <td>{{ $line->subTotal }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="5">Total</td>
                    <td>{{ $data->total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>