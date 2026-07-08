<!DOCTYPE html>
<html>
    <head>
        <title>Orders Report</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
            }

            table {
                width:100%;
                border-collapse: collapse;
            }

            th, td {
                border:1px solid #ddd;
                padding:6px;
            }

            th {
                background:#eee;
            }
        </style>
    </head>

    <body class="container-fluid">
        <div class="row text-center">
        `    <div class="col-sm-12">
                <h3>{{ $order->name }}</3>
                <h6>{{ $order->orderDate }}</h6>
            </div>
        </div><hr>

        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Line Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $line)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $line->name }}</td>
                        <td>{{ $line->unit_price }}</td>
                        <td>{{ $line->orderQuantity }}</td>
                        <td>{{ $line->lineTotal }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="4">Total</td>
                    <td>{{ $order->amount }}</td>
                </tr>
            </tbody>
        </table>`
    </body>
</html>