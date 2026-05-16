<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Admin Dashboard</h1>

    <!-- PRODUCTS -->
    <h3 class="mt-4">Products</h3>

    <a href="/add-product" class="btn btn-success mb-3">Add Product</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>

        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }} AZN</td>
        </tr>
        @endforeach
    </table>

    <!-- ORDERS -->
    <h3 class="mt-5">Orders</h3>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->total }} AZN</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </table>

</div>

</body>
</html>
