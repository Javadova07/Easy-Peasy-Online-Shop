<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <!-- IMAGE -->
                @if($product->image)
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

                <!-- TECH INFO -->
                @if($product->category == 'tech')

                    @if($product->ram)
                        <p><strong>RAM:</strong> {{ $product->ram }}</p>
                    @endif

                    @if($product->storage)
                        <p><strong>Storage:</strong> {{ $product->storage }}</p>
                    @endif

                    @if($product->processor)
                        <p><strong>Processor:</strong> {{ $product->processor }}</p>
                    @endif

                @endif

                <!-- CLOTHES INFO -->
                @if($product->category == 'clothes')

                    @if($product->size)
                        <p><strong>Size:</strong> {{ $product->size }}</p>
                    @endif

                    @if($product->color)
                        <p><strong>Color:</strong> {{ $product->color }}</p>
                    @endif

                    @if($product->material)
                        <p><strong>Material:</strong> {{ $product->material }}</p>
                    @endif

                @endif

                <!-- MAKEUP INFO -->
                @if($product->category == 'makeup')

                    @if($product->tone)
                        <p><strong>Tone:</strong> {{ $product->tone }}</p>
                    @endif

                    @if($product->weight)
                        <p><strong>Weight:</strong> {{ $product->weight }}</p>
                    @endif

                    @if($product->skin_type)
                        <p><strong>Skin Type:</strong> {{ $product->skin_type }}</p>
                    @endif

                @endif

                <!-- SHOES INFO -->
                @if($product->category == 'shoes')

                    @if($product->shoe_size)
                        <p><strong>Shoe Size:</strong> {{ $product->shoe_size }}</p>
                    @endif

                    @if($product->color)
                        <p><strong>Color:</strong> {{ $product->color }}</p>
                    @endif

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

                        <button type="submit"
                                class="btn btn-success px-4">
                            Add To Cart 🛒
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>