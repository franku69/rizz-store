<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'qty' => 'required|numeric',
        'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'description' => 'required|string',
        'type' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }

    Product::create($data);
    return redirect(route('product.index'));
}


    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }

    public function adding(Request $request)
    {
        $items = new Product();
        $items->name = $request->name;
        $items->qty = $request->qty;
        $items->price = $request->price;
        $items->description = $request->description;
        $items->save();

        return response()->json('Added Successfully');
    }

    public function edited(Request $request)
    {
        $item = Product::findOrFail($request->id);
        $item->name = $request->name;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->update();

        return response()->json('Updated Successfully');
    }

    public function deleted(Request $request)
    {
        $item = Product::findOrFail($request->id)->delete();
        return response()->json('Deleted Successfully');
    }

    public function getData()
    {
        $items = Product::all();
        return response()->json($items);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        return view('search_results', compact('products'));
    }

    public function suggestions(Request $request)
    {
        $query = $request->get('query');
        $suggestions = Product::where('name', 'LIKE', "%{$query}%")
            ->pluck('name')
            ->take(5);

        return response()->json($suggestions);
    }

    public function indexed()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    public function indexsort(Request $request)
{
    $type = $request->input('type');
    $query = Product::query();
    
    if ($type) {
        $query->where('type', $type);
    }
    
    $products = $query->get();
    
    return view('products.index', ['products' => $products]);
}


public function showCheckout(Request $request)
{
    // Retrieve cart from session
    $cart = session()->get('cart', []);

    return view('checkout', compact('cart'));
}

public function processCheckout(Request $request)
{
    // Validate the cart data
    $cart = $request->validate([
        'cart' => 'required|array',
        'cart.*.id' => 'required|integer',
        'cart.*.name' => 'required|string',
        'cart.*.price' => 'required|numeric',
        'cart.*.quantity' => 'required|integer',
    ]);

    // Store the cart in the session
    session()->put('cart', $cart['cart']);

    return response()->json(['message' => 'Checkout processed successfully']);
}
public function checkout()
{
    // Assuming you store cart in session, modify as needed
    $cart = session('cart', []);

    // Passing the cart data to the checkout view
    return view('checkout', compact('cart'));
}
}
