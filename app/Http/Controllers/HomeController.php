<?php

namespace App\Http\Controllers;

use App\Models\Product; // Make sure to import the Product model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve 4 random products
        $randomProducts = Product::inRandomOrder()->take(4)->get();

        // Pass the random products to the view
        return view('home', ['randomProducts' => $randomProducts]);
    }
}