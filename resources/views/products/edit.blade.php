<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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

        input[type="text"] {
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
        <h1>Edit Product</h1>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}" placeholder="Product Name">
    <label for="qty">Quantity</label>
    <input type="text" name="qty" id="qty" value="{{ $product->qty }}" placeholder="Qty">
    <label for="price">Price</label>
    <input type="text" name="price" id="price" value="{{ $product->price }}" placeholder="Price">
    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="{{ $product->description }}" placeholder="Description">
    <label for="image">Product Image</label>
    <input type="file" name="image" id="image">
    <input type="submit" value="Update Product">
</form>
    </div>
</body>
</html>
