<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>{{ $product->name }}</h1>

    <p>{{ $product->description }}</p>

    <h3>{{ $product->price }} AZN</h3>

    <a href="/add-to-cart/{{ $product->id }}" class="btn btn-success">
        Add to Cart
    </a>

</div>

</body>
</html>