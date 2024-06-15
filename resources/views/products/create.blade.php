<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            color: red;
        }

        ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a Product</h1>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" placeholder="Product Name" required>
            <label for="qty">Quantity</label>
            <input type="text" name="qty" id="qty" placeholder="Qty" required>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" placeholder="Price" required>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description" required>
            <label for="type">Product Type (Electronics, Clothing, Food)</label>
            <input type="text" name="type" id="type" placeholder="Product Type" pattern="^(Electronics|Clothing|Food)$" title="Please enter Electronics, Clothing, or Food" required>
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" required>
            <input type="submit" value="Save a New Product">
        </form>
    </div>

    <script>
        function validateForm() {
            var productTypeInput = document.getElementById('type').value.trim();
            var allowedTypes = ['Electronics', 'Clothing', 'Food'];

            if (!allowedTypes.includes(productTypeInput)) {
                alert('Please enter a valid product type: Electronics, Clothing, or Food');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
