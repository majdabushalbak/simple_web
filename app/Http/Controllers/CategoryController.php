<?php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        // Apply the admin middleware to specific methods
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // Display a listing of the categories.
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category.
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created category in the database.
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        // Create a new category
        Category::create($request->all());

        // Redirect to the categories index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Display the specified category.
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing the specified category.
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update the specified category in the database.
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        // Update the category
        $category->update($request->all());

        // Redirect to the categories index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from the database.
    public function destroy(Category $category)
    {
        $category->delete();

        // Redirect to the categories index page with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
