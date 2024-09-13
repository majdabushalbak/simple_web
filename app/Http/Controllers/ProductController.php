<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories
        $categories = Category::all();

        // Get the category_id from the request, if any
        $selectedCategory = $request->input('category_id');

        // Fetch products based on the selected category
        if ($selectedCategory) {
            $products = Product::where('category_id', $selectedCategory)->get();
        } else {
            $products = Product::all();
        }

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

public function create()
{
    $categories = Category::all(); // Fetch all categories from the database

    return view('products.create', compact('categories'));
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
    ]);

    // Store the image in the 'public/storage/images' directory
    $image = $request->file('image');
    $imagePath = $image->storeAs('images', $image->hashName(), 'public'); // Save in 'public/storage/images'

    // Save the product to the database
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'image' => $imagePath, // Save the image path in the 'image' column
    ]);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
{
    $categories = Category::all(); // Fetch all categories
    return view('products.edit', compact('product', 'categories'));
}


public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->storeAs('images', $image->hashName(), 'public'); // Store in 'public/storage/images'

        // Delete the old image if it exists
        if ($product->image && $product->image !== 'default.jpg') {
            Storage::delete('public/' . $product->image);
        }

        $product->image = $imagePath; // Update the image path
    }

    // Update product details
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}


    public function destroy(Product $product)
    {
        // Delete image from storage
        if ($product->image && $product->image !== 'default.jpg') {
            Storage::delete('public/storage/' . $product->image);
        }



        // Delete product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
