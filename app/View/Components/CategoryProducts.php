<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\Component;
use Livewire\WithPagination;

class CategoryProducts extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        
        $products = $this->category->products()->where('status', 2)->paginate(12);
        
        return view('components.category-products', compact('products'));
    }
}
