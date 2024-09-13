<?php

namespace App\Http\Controllers;

use App\Models\Product; // Make sure to import the Product model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve 5 random product IDs
        $randomProductIds = Product::inRandomOrder()->take(5)->pluck('id');

        // Pass the random IDs to the view
        return view('home', ['randomProductIds' => $randomProductIds]);
    }
}
