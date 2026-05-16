<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

@php
use Illuminate\Support\Str;
@endphp

<!-- CART BUTTON -->
<div class="container py-3">
    <div class="d-flex justify-content-end">

        <a href="/cart" class="btn btn-dark position-relative">
            🛒 Cart

            @php
                $count = 0;
                if(session('cart')){
                    foreach(session('cart') as $item){
                        $count += $item['qty'];
                    }
                }
            @endphp

            @if($count > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $count }}
                </span>
            @endif

        </a>

    </div>
</div>

<!-- PRODUCTS -->
<div class="container py-5">

    <h1 class="mb-5 text-center fw-bold">Products</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        @foreach($products as $product)

            <div class="col-md-4 col-sm-6 mb-4">

                <div class="card shadow-lg border-0 rounded-4 h-100 overflow-hidden">

                    <!-- IMAGE -->
                    @if($product->image)
                        <img src="/storage/{{ $product->image }}"
                             class="card-img-top"
                             style="height:250px; object-fit:contain; background:white;">
                    @else
                        <img src="https://via.placeholder.com/300"
                             class="card-img-top"
                             style="height:250px; object-fit:contain; background:white;">
                    @endif

                   <div class="card-body d-flex flex-column h-100">

    

    <!-- NAME -->
    <h3 class="fw-bold">
        {{ $product->name }}
    </h3>

    <!-- PRICE -->
    <h4 class="text-success mb-2">
        {{ $product->price }} AZN
    </h4>

    <!-- DESCRIPTION -->
    <p class="text-muted mb-3 flex-grow-1">
        {{ Str::limit($product->description, 80) }}
    </p>

    <!-- VIEW BUTTON -->
    <a href="/products/{{ $product->id }}"
       class="btn btn-primary mb-2 mt-auto">
        View
    </a>

    <!-- ADD TO CART -->
                        <!-- ADD TO CART -->
                        @php
                            $inCart = session('cart') && isset(session('cart')[$product->id]);
                        @endphp

                        <form action="/cart/add/{{ $product->id }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="btn w-100 {{ $inCart ? 'btn-secondary' : 'btn-success' }}">

                                @if($inCart)
                                    Added (+{{ session('cart')[$product->id]['qty'] }})
                                @else
                                    Add To Cart
                                @endif

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

</body>
</html>