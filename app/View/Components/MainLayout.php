<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;


class MainLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function __construct(    
        public string $title = 'Челбаскет',
        public string $description = 'Челбаскет - магазин футболок, майок, мячей, кофт и сувениров',
        public string $keywords ='Челбаскет, футболки, майки, мячи, кофты, сувениры'
    ){}
    
    public function render(): View
    {
        
        
        $categories = Category::all();

        return view('layouts.main', compact('categories'));
    }
}
