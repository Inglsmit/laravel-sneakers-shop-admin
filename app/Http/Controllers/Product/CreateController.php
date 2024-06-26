<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ModelGroup;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $model_groups = ModelGroup::all();

        return view('product.create', compact('tags', 'colors', 'categories', 'model_groups'));
    }
}
