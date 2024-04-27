<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::with('category', 'tags')->get();
        $products->transform(function ($product) {
            $product->published_text = $product->is_published ? 'Yes' : 'No';
            return $product;
        });
        return view('product.index', compact('products'));
    }
}
