<?php

namespace App\View\Components\products;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categoriesSlider extends Component
{
    public $categories;
    public $selectedCategory;
    public function __construct($categories, $selectedCategory)
    {
        $this->categories = $categories;
        $this->selectedCategory = $selectedCategory;
    }


    public function render(): View|Closure|string
    {
        return view('components.products.categories-slider');
    }
}
