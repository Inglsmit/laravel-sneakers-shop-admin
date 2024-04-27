<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $data['is_published'] = $data['is_published'] ? '1' : '0';
        $tagsIds = $data['tags'] ?? null;
        $colorsIds = $data['colors'] ?? null;
        unset($data['tags'], $data['colors']);

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

        return view('product.show', compact('product'));
    }
}
