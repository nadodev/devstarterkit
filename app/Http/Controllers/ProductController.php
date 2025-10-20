<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::active()
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $featuredProducts = Product::active()
            ->featured()
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        return view('products.index', compact('products', 'featuredProducts'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->active()
            ->firstOrFail();

        $relatedProducts = Product::active()
            ->where('id', '!=', $product->id)
            ->where('category', $product->category)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function category($category)
    {
        $products = Product::active()
            ->where('category', $category)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('products.category', compact('products', 'category'));
    }
}