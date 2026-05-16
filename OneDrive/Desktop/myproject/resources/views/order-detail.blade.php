<!DOCTYPE html>
<html>
<head>
    <title>Order Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Order #{{ $order->id }}</h1>

    <p><b>Total:</b> {{ $order->total }} AZN</p>
    <p><b>Date:</b> {{ $order->created_at }}</p>

    <hr>

    <h3>Products</h3>

    @foreach($items as $item)
        <div class="card p-3 mt-2">
            <h5>{{ $item->product_name }}</h5>
            <p>Qty: {{ $item->qty }}</p>
            <p>Price: {{ $item->price }} AZN</p>
        </div>
    @endforeach

</div>

</body>
</html>