<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Order Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#f5f7fb;">

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                🧾 Order #{{ $order->id }}
            </h1>

            <p class="text-muted">
                {{ $order->created_at }}
            </p>

        </div>

        <span class="badge bg-success fs-6 px-4 py-3 rounded-pill">
            {{ $order->status }}
        </span>

    </div>

    <!-- ORDER CARD -->
    <div class="card border-0 shadow-lg rounded-4 mb-5"
         style="background:linear-gradient(135deg,#ffffff,#f3f6ff);">

        <div class="card-body p-5">

            <div class="row">

                <div class="col-md-4">

                    <h5 class="text-muted mb-2">
                        Total Amount
                    </h5>

                    <h2 class="fw-bold">
                        {{ $order->total }} AZN
                    </h2>

                </div>

                <div class="col-md-4">

                    <h5 class="text-muted mb-2">
                        Payment Status
                    </h5>

                    <h4 class="text-success">
                        ✔ Paid
                    </h4>

                </div>

                <div class="col-md-4">

                    <h5 class="text-muted mb-2">
                        Delivery
                    </h5>

                    <h4>
                        🚚 Shipping
                    </h4>

                </div>

            </div>

        </div>

    </div>

    <!-- PRODUCTS -->
    <h2 class="fw-bold mb-4">
        🛍 Ordered Products
    </h2>

    <div class="row">

        @foreach($items as $item)

            @php
                $product = \App\Models\Product::where('name', $item->product_name)->first();
            @endphp

            @if($product)

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow rounded-4 h-100 product-card">

                    <!-- IMAGE -->
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top rounded-top-4"
                         style="height:250px; object-fit:cover;">

                    <div class="card-body">

                        <h4 class="fw-bold">
                            {{ $product->name }}
                        </h4>

                        <p class="text-muted mb-3">
                            {{ $product->description }}
                        </p>

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-muted">
                                Price
                            </span>

                            <strong>
                                {{ $item->price }} AZN
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-muted">
                                Quantity
                            </span>

                            <strong>
                                {{ $item->qty }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between">

                            <span class="text-muted">
                                Total
                            </span>

                            <strong class="text-primary">
                                {{ $item->price * $item->qty }} AZN
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

            @endif

        @endforeach

    </div>

</div>

<style>

.product-card {

    transition:0.3s;
}

.product-card:hover {

    transform:translateY(-8px);

    box-shadow:0 15px 35px rgba(0,0,0,0.15);
}

.card-img-top {

    border-bottom:1px solid #eee;
}

</style>

</body>
</html>