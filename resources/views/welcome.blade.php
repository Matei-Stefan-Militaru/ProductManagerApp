<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
    <h1>Welcome to the Product Manager</h1>
    <form action="{{ route('product.redirect') }}" method="POST">
        @csrf
        <div>
            <label for="action">Choose an action:</label>
            <select name="action" id="action">
                <option value="create">Create Product</option>
                <option value="edit">Edit Product</option>
                <option value="show">Show Product</option>
                <option value="index">View All Products</option>
            </select>
        </div>

        <div id="product_id_div" style="display: none;">
            <label for="product_id">Product ID (for Edit/Show):</label>
            <input type="number" name="product_id" id="product_id">
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        // Show the product ID input field when 'Edit' or 'Show' is selected
        document.getElementById('action').addEventListener('change', function () {
            var productIdDiv = document.getElementById('product_id_div');
            if (this.value === 'edit' || this.value === 'show') {
                productIdDiv.style.display = 'block';
            } else {
                productIdDiv.style.display = 'none';
            }
        });
    </script>
</body>
</html>