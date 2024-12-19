<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <h1>Create a new Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" required min="0">
        </div>

        <div>
            <label for="stock">Stock Quantity</label>
            <input type="number" name="stock" id="stock" required min="0">
        </div>

        <div>
            <label for="category">Category</label>
            <input type="text" name="category" id="category" required>
        </div>

        <div>
            <label for="image_url">Image URL</label>
            <input type="url" name="image_url" id="image_url">
        </div>

        <button type="submit">Create Product</button>
    </form>

</body>

</html>


