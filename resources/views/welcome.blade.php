<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our E-commerce Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            background-color: #007bff;
            color: #fff;
        }

        header img {
            max-height: 40px;
            border-radius: 50%;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #218838;
        }

        .category-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .category-btn {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.75rem; /* Adjusted padding */
            font-size: 1.2rem; /* Adjusted font size */
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .category-btn:hover {
            background-color: #0056b3;
        }

        .category-btn img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }

        #featured-products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product {
            width: 45%;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
        }

        .product img {
            width: 100%;
            height: 450px; /* Ensure images maintain aspect ratio */
            display: block;
        }

        .product-info {
            padding: 10px;
        }

        .product-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-size: 1.25rem;
            color: #007bff;
        }

        #search-bar {
            display: flex;
            align-items: center;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            position: relative;
        }

        #search-bar input[type="text"] {
            flex: 1; /* Take remaining space */
            padding: 10px;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
        }

        #search-bar button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #search-bar button:hover {
            background-color: #218838;
        }

        #autocomplete-list {
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            color: black;
        }

        #autocomplete-list div {
            padding: 10px;
            cursor: pointer;
        }

        #autocomplete-list div:hover {
            background-color: #ddd;
        }

        #cart {
            display: none; /* Initially hide cart */
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            background-color: #f8f9fa;
            border-left: 1px solid #ddd;
            padding: 20px;
            box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Ensure cart appears above other content */
        }

        #cart h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        #cart-items {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #cart-items li {
            margin-bottom: 5px;
        }

        #cart-summary {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        #cart-summary p {
            margin: 0;
            font-size: 1.2rem;
        }

        #cart-summary strong {
            font-size: 1.25rem;
            color: #007bff;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div>
            <h1><img src="{{ asset('images/logo1.png') }}" alt="Company Logo"> RIZZ STORE</h1>
        </div>
        <div id="search-bar">
            <form id="search-form" action="{{ route('product.search') }}" method="GET">
                <input type="text" name="query" placeholder="Search..." id="search-input" oninput="showSuggestions(this.value)" />
            </form>
            <button type="button" onclick="document.getElementById('search-form').submit();">Search</button>
            <div id="autocomplete-list"></div>
        </div>
        <div>
            <button class="btn" id="cart-toggle-btn" onclick="toggleCart()">Cart</button>
            <a href="{{ route('product.upload') }}" class="btn">Upload Product</a>
        </div>
    </div>
</header>

<div class="container">
    <div class="category-container">
        <button class="category-btn" data-category="all" onclick="filterProducts('all')">
            <img src="{{ asset('images/car1.jpg') }}" alt="All Products"> All
        </button>
        <button class="category-btn" data-category="electronics" onclick="filterProducts('electronics')">
            <img src="{{ asset('images/phone.jpg') }}" alt="Electronics"> Electronics
        </button>
        <button class="category-btn" data-category="clothing" onclick="filterProducts('clothing')">
            <img src="{{ asset('images/clothes.jpg') }}" alt="Clothing"> Clothing
        </button>
        <button class="category-btn" data-category="food" onclick="filterProducts('food')">
            <img src="{{ asset('images/burger.jpg') }}" alt="Food"> Food
        </button>
        <!-- Add more categories as needed -->
    </div>
    <h2>Featured Products</h2>
    <section id="featured-products">
        @foreach($products as $product)
        <div class="product" data-category="{{ strtolower($product->type) }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="product-info">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-price">₱{{ number_format($product->price, 2) }}</p>
                <button class="btn" onclick="addToCart('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}')">Add to Cart</button>
            </div>
        </div>
        @endforeach
    </section>

    <section id="promotions">
        <h2>Promotions</h2>
        <p>Check out our latest promotions and special offers!</p>
        <a href="#" class="btn">View Promotions</a>
    </section>
</div>

<div id="cart">
    <h2>Shopping Cart</h2>
    <ul id="cart-items"></ul>
    <div id="cart-summary">
        <p>Total Items: <strong id="total-items">0</strong></p>
        <p>Total Amount: ₱<strong id="total-amount">0.00</strong></p>
        <button class="btn" onclick="checkout()">Checkout</button>
    </div>
</div>

<script>
    let cart = [];

    function addToCart(productId, productName, productPrice) {
        let item = {
            id: productId,
            name: productName,
            price: parseFloat(productPrice),
            quantity: 1
        };

        let index = cart.findIndex(item => item.id === productId);
        if (index !== -1) {
            cart[index].quantity++;
        } else {
            cart.push(item);
        }

        updateCartUI();
    }

    function updateCartUI() {
        let cartItems = document.getElementById('cart-items');
        cartItems.innerHTML = '';
        let totalItems = 0;
        let totalAmount = 0;

        cart.forEach(item => {
            totalItems += item.quantity;
            totalAmount += item.price * item.quantity;

            let li = document.createElement('li');
            li.textContent = `${item.name} - ₱${item.price.toFixed(2)} x ${item.quantity}`;
            cartItems.appendChild(li);
        });

        document.getElementById('total-items').textContent = totalItems;
        document.getElementById('total-amount').textContent = totalAmount.toFixed(2);
    }

    function checkout() {
        console.log('Checkout initiated');
        window.location.href = "{{ route('checkout.index') }}";
    }

    function showSuggestions(query) {
        if (query.length === 0) {
            document.getElementById('autocomplete-list').innerHTML = '';
            return;
        }

        fetch(`{{ route('product.suggestions') }}?query=${query}`)
            .then(response => response.json())
            .then(data => {
                let suggestions = data.map(item => `<div onclick="selectSuggestion('${item}')">${item}</div>`).join('');
                document.getElementById('autocomplete-list').innerHTML = suggestions;
            });
    }

    function selectSuggestion(value) {
        document.getElementById('search-input').value = value;
        document.getElementById('autocomplete-list').innerHTML = '';
        document.getElementById('search-form').submit();
    }

    function toggleCart() {
        let cart = document.getElementById('cart');
        cart.style.display = cart.style.display === 'none' ? 'block' : 'none';
    }

    function filterProducts(category) {
        let products = document.querySelectorAll('.product');

        products.forEach(product => {
            if (category === 'all' || product.dataset.category === category) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
</script>
</body>
</html>
