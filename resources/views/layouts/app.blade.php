<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Your App') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="text-gray-500 dark:text-gray-300 focus:outline-none">
                            <!-- Hero icon: outline menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <!-- Logo or site name -->
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}" class="flex items-center">
                                <span class="text-lg font-bold">Your App Name</span>
                            </a>
                        </div>
                        <!-- Navigation links -->
                        <div class="hidden sm:block sm:ml-6">
                            <ul class="flex space-x-4">
                                <li><a href="{{ route('home') }}" class="text-gray-900 dark:text-gray-300">Home</a></li>
                                <li><a href="{{ route('product.index') }}" class="text-gray-900 dark:text-gray-300">Products</a></li>
                                @auth
                                    <li><a href="{{ route('product.create') }}" class="text-gray-900 dark:text-gray-300">Add Product</a></li>
                                    <li><a href="{{ route('dashboard') }}" class="text-gray-900 dark:text-gray-300">Dashboard</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="text-gray-900 dark:text-gray-300"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                Logout
                                            </a>
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}" class="text-gray-900 dark:text-gray-300">Login</a></li>
                                    <li><a href="{{ route('register') }}" class="text-gray-900 dark:text-gray-300">Register</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading and Content -->
        <main class="py-4">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
