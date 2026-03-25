<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice - Order #{{ $order->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Order Invoice</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $order->status }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>${{ number_format($order->total, 2) }}</td>
        </tr>
        <tr>
            <th>Notes</th>
            <td>{{ $order->notes ?? '—' }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $order->created_at }}</td>
        </tr>
    </table>
</body>

</html>