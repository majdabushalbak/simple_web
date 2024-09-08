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
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
    ]);

    // Store the image in the 'images' folder inside 'storage/app/public'
    $image = $request->file('image');
    $imagePath = $image->store('images', 'public'); // This will store the image in 'storage/app/public/images'
    // Save the product to the database
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id, // Assign category_id from form data
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
        $imageName = $image->hashName(); // Generate a unique name for the image
        $image->storeAs('public', $imageName);

        // Delete old image if exists
        if ($product->image && $product->image !== 'default.jpg') {
            Storage::delete('public/images/' . $product->image);
        }

        $product->image = $imageName;
    }

    // Update product details
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category_id; // Assign category_id, not category
    $product->save();

    // Redirect with success message
    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}


    public function destroy(Product $product)
    {
        // Delete image from storage
        if ($product->image && $product->image !== 'default.jpg') {
            Storage::delete('public/images/' . $product->image);
        }



        // Delete product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
