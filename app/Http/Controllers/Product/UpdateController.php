<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if($data['preview_image'] !== null){
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }else{
            unset($data['preview_image']);
        }
        $data['is_published'] = $data['is_published'] ? '1' : '0';
        $tagsIds = $data['tags'] ?? null;
        $colorsIds = $data['colors'] ?? null;
        $productImages = $data['product_images'] ?? null;
        unset($data['tags'], $data['colors'], $data['product_images']);

        $product->update($data);

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
                if($productImage !== null){
                    try {
                        $filePath = Storage::disk('public')->put('/images', $productImage);
                        // TODO: delete before UPDATE
                        ProductImage::create([
                            'product_id' => $product->id,
                            'file_path' => $filePath,
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Error occurred while saving product image: ' . $e->getMessage());
                    }
                }
            }
        }

        return view('product.show', compact('product'));
    }
}
