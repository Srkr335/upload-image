<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index(int $productId)
    {
        $product = Product::findOrFail($productId);

        return view('product-image.index', compact('product'));
    }
}
