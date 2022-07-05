<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        // 判断商品是否已经上架，如果没有上架则抛出异常。
        if (!$product->on_sale) {
            abort('Product not available');
        }
        return new ProductResource($product->load('skus'));
    }

    public function favor(Product $product, Request $request)
    {
        $user = $request->user();
        if ($wishlist = $user->wishlists()->find($product->id)) {
            return $wishlist;
        }

        $user->wishlists()->attach($product);

        return $product;
    }

    public function disfavor(Product $product, Request $request)
    {
        $user = $request->user();
        $user->wishlists()->detach($product);

        return $product;
    }
}
