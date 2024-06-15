<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('welcome', ['products' => $products]); 
    }
}
