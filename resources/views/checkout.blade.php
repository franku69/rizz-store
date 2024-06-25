<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
      /* Minimalistic styles for the checkout page */
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .total {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
            color: #007bff;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            margin: 20px 0;
            width: 100%;
            font-size: 1rem;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        @if (empty($cart) || count($cart) === 0)
            <p>Your cart is empty.</p>
        @else
            <div id="cart-items">
                @foreach ($cart as $item)
                    <div class="cart-item">
                        <span>{{ $item['name'] }}</span>
                        <span>₱{{ number_format($item['price'], 2) }}</span>
                        <span>Qty: {{ $item['quantity'] }}</span>
                    </div>
                @endforeach
            </div>
            <div class="total">
                Total: ₱{{ number_format(collect($cart)->sum(function ($item) {
                    return $item['price'] * $item['quantity'];
                }), 2) }}
            </div>
        @endif
    </div>
</body>
</html>
