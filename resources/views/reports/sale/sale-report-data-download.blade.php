<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th {
        text-align: left;
    }

    td {
        padding: 5px;
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #eee;
    }

    table tr:nth-child(odd) {
        background-color: #fff;
    }

    table th {
        background-color: black;
        color: white;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .table-responsive h3 {
        text-align: center;
    }

    .table-responsive p {
        text-align: center;
    }

    .table-responsive table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-responsive table td, .table-responsive table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table-responsive table tr:nth-child(even){background-color: #f2f2f2;}

    .table-responsive table tr:hover {background-color: #ddd;}

    .table-responsive table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }



    </style>
</head>
<body>
    @if(count($sales) > 0)
    <div class="table-responsive">
        <h3>Sale Info</h3>
        <p>Start Date: {{ $start_date }}</p>
        <p>End Date: {{ $end_date }}</p>
        <table>
            <thead>
                <tr>
                <th>SL.</th>
                <th>Customer</th>
                <th>Description</th>
                <th>Buy Price</th>
                <th>Sale Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Sale Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->sale->customer_name ?? '' }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->buy_price_price }}</td>
                    <td>{{ $item->sale_price }}</td>
                    <td>{{ $item->sale_quantity }}</td>
                    <td>{{ $item->total_price }}</td>
                    <td>
                        @if($item->created_at != null)
                            {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                        @endif
                    </td>
                </tr>
                @endforeach
                <tr>
                <td colspan="3" style="text-align: right;">Total</td>
                <td>{{ $sales->sum('buy_price_price') }}</td>
                <td>
                    {{ $sales->sum('sale_price') }}
                </td>
                <td></td>
                <td>
                    {{ $sales->sum('total_price') }}
                </td>
                <td></td>
                </tr>

            </tbody>
        </table>
    </div>
    @endif
</body>
</html>
