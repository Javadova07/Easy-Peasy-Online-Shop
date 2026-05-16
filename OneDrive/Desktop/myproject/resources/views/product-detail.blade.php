<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

@php
    $attr = json_decode($product->attributes, true);
@endphp

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <!-- PRODUCT IMAGES -->
                @if($product->images->count())

                <div id="productSlider"
                     class="carousel slide mb-4"
                     data-bs-ride="carousel">

                    <div class="carousel-inner rounded-4">

                        @foreach($product->images as $key => $img)

                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                <img src="/storage/{{ $img->image }}"
                                     class="d-block w-100"
                                     style="height:450px; object-fit:contain; background:white;">

                            </div>

                        @endforeach

                    </div>

                    <!-- PREV -->
                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#productSlider"
                            data-bs-slide="prev">

                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>

                    </button>

                    <!-- NEXT -->
                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#productSlider"
                            data-bs-slide="next">

                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>

                    </button>

                </div>

                @elseif($product->image)

                    <!-- OLD SINGLE IMAGE -->
                    <img src="/storage/{{ $product->image }}"
                         class="img-fluid rounded mb-4"
                         style="height:350px; object-fit:contain; background:white;">

                @endif

                <!-- NAME -->
                <h1 class="fw-bold mb-3">
                    {{ $product->name }}
                </h1>

                <!-- PRICE -->
                <h2 class="text-success mb-3">
                    {{ $product->price }} AZN
                </h2>

                <!-- DESCRIPTION -->
                <p class="fs-5 text-muted mb-4">
                    {{ $product->description }}
                </p>

                <hr>

                <!-- TECH -->
                @if(($attr['ram'] ?? $product->ram))
                    <p>
                        <strong>RAM:</strong>
                        {{ $attr['ram'] ?? $product->ram }}
                    </p>
                @endif

                @if(($attr['storage'] ?? $product->storage))
                    <p>
                        <strong>Storage:</strong>
                        {{ $attr['storage'] ?? $product->storage }}
                    </p>
                @endif

                @if(($attr['processor'] ?? $product->processor))
                    <p>
                        <strong>Processor:</strong>
                        {{ $attr['processor'] ?? $product->processor }}
                    </p>
                @endif

                <!-- CLOTHES -->
                @if(($attr['size'] ?? $product->size))
                    <p>
                        <strong>Size:</strong>
                        {{ $attr['size'] ?? $product->size }}
                    </p>
                @endif

                @if(($attr['color'] ?? $product->color))
                    <p>
                        <strong>Color:</strong>
                        {{ $attr['color'] ?? $product->color }}
                    </p>
                @endif

                @if(($attr['material'] ?? $product->material))
                    <p>
                        <strong>Material:</strong>
                        {{ $attr['material'] ?? $product->material }}
                    </p>
                @endif

                <!-- MAKEUP -->
                @if(($attr['tone'] ?? $product->tone))
                    <p>
                        <strong>Tone:</strong>
                        {{ $attr['tone'] ?? $product->tone }}
                    </p>
                @endif

                @if(($attr['weight'] ?? $product->weight))
                    <p>
                        <strong>Weight:</strong>
                        {{ $attr['weight'] ?? $product->weight }}
                    </p>
                @endif

                @if(($attr['skin_type'] ?? $product->skin_type))
                    <p>
                        <strong>Skin Type:</strong>
                        {{ $attr['skin_type'] ?? $product->skin_type }}
                    </p>
                @endif

                <!-- SHOES -->
                @if(($attr['shoe_size'] ?? $product->shoe_size))
                    <p>
                        <strong>Shoe Size:</strong>
                        {{ $attr['shoe_size'] ?? $product->shoe_size }}
                    </p>
                @endif

                <!-- BUTTONS -->
                <div class="d-flex gap-3 mt-4">

                    <a href="/products"
                       class="btn btn-secondary px-4">

                        Back

                    </a>

                    <form action="/cart/add/{{ $product->id }}"
                          method="POST">

                        @csrf

                        @php
                            $inCart = session('cart') && isset(session('cart')[$product->id]);
                        @endphp

                        <button type="submit"
                                class="btn px-4 {{ $inCart ? 'btn-secondary' : 'btn-success' }}">

                            @if($inCart)

                                Added (+{{ session('cart')[$product->id]['qty'] }})

                            @else

                                Add To Cart 🛒

                            @endif

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>