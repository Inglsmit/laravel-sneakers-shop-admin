<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ModelGroup;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $model_groups = ModelGroup::all();

        $product->load('tags', 'colors');
        return view('product.edit', compact('product','tags', 'colors', 'categories', 'model_groups'));
    }
}
