<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['is_published'] = $data['is_published'] ? '1' : '0';
        $tagsIds = $data['tags'] ?? null;
        $colorsIds = $data['colors'] ?? null;
        $productImages = $data['product_images'] ?? null;
        unset($data['tags'], $data['colors'], $data['product_images']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        if($tagsIds !== null){
            $product->tags()->sync($tagsIds);
        } else{
            $product->tags()->detach();
        }
        if($tagsIds !== null){
            $product->colors()->sync($colorsIds);
        }else{
            $product->colors()->detach();
        }

        if($productImages !== null){
            foreach ($productImages as $productImage) {
                try {
                    $filePath = Storage::disk('public')->put('/images', $productImage);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'file_path' => $filePath,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Error occurred while saving product image: ' . $e->getMessage());
                }
            }
        }

//        foreach ($tagsIds as $tagsId){
//            ProductTag::firstOrCreate([
//                'product_id' => $product->id,
//                'tag_id' => $tagsId
//            ]);
//        }
//
//        foreach ($colorsIds as $colorsId){
//            ColorProduct::firstOrCreate([
//                'product_id' => $product->id,
//                'color_id' => $colorsId
//            ]);
//        }

        return redirect()->route('product.index');
    }
}
