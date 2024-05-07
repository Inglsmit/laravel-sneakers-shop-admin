<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $product = Product::with('category', 'tags')->where('is_published', 1)->findOrFail($product->id);
        return ProductResource::make($product);
    }
}
