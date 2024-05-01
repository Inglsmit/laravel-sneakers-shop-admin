<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
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

        return ProductResource::collection($products);
    }
}
