<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class SidebarViewComposer
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $view->with('categories',$this->category->with('products')->get());
    }
}