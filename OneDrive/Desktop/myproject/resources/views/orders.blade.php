<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>My Orders</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info mt-3">
            No orders yet
        </div>
    @endif

    @foreach($orders as $order)

        <div class="card p-3 mt-3 shadow-sm">

            <h3>Order #{{ $order->id }}</h3>

            <p><b>Total:</b> {{ $order->total }} AZN</p>

           <p>Status: 
    <span class="badge bg-warning">
        {{ $order->status }}
    </span>
</p>

            <p><b>Date:</b> {{ $order->created_at->format('d-m-Y H:i') }}</p>

            <a href="/orders/{{ $order->id }}"
   class="btn btn-info">

    View Details

</a>

        </div>

    @endforeach

</div>

</body>
</html>
<a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">
    View Details
</a>
<p>
    Status:
    @if($order->status == 'paid')
        <span class="badge bg-success">Paid</span>
    @else
        <span class="badge bg-warning">Pending</span>
    @endif
</p>