<!DOCTYPE html>
<html>
<head>
    <title>Invoice Laundry</title>

    <style>
        body{
            font-family: sans-serif;
            padding:20px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        td{
            padding:8px;
            border-bottom:1px solid #ddd;
        }

        .title{
            text-align:center;
            margin-bottom:20px;
        }

        .total{
            font-size:20px;
            font-weight:bold;
            color:green;
        }
    </style>
</head>
<body>

    <div class="title">
        <h1>LaundryKu</h1>
        <p>Laundry Professional System</p>
    </div>

    <table>

        <tr>
            <td>Invoice</td>
            <td>{{ $transaction->invoice }}</td>
        </tr>

        <tr>
            <td>Customer</td>
            <td>{{ $transaction->customer->name }}</td>
        </tr>

        <tr>
            <td>Package</td>
            <td>{{ $transaction->laundryPackage->name }}</td>
        </tr>

        <tr>
            <td>Weight</td>
            <td>{{ $transaction->weight }} Kg</td>
        </tr>

        <tr>
            <td>Price</td>
            <td>Rp {{ number_format($transaction->price) }}</td>
        </tr>

        <tr>
            <td>Status</td>
            <td>{{ $transaction->status }}</td>
        </tr>

        <tr>
            <td>Payment</td>
            <td>{{ $transaction->payment_status }}</td>
        </tr>

        <tr>
            <td>Entry Date</td>
            <td>{{ $transaction->entry_date }}</td>
        </tr>

        <tr>
            <td>Finish Date</td>
            <td>{{ $transaction->finish_date }}</td>
        </tr>

        <tr>
            <td>Total</td>
            <td class="total">
                Rp {{ number_format($transaction->total_price) }}
            </td>
        </tr>

    </table>

</body>
</html>