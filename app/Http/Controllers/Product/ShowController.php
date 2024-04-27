<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->load('tags', 'colors', 'category');
        return view('product.show', compact('product'));
    }
}
