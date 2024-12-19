<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <p>Price: ${{ $product->price }}</p>
    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
