<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('frontend.home', compact('products'));
    }
    public function productDetail($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('frontend.product-detail', compact('product'));
    }
    public function shop()
    {
        // All categories for filter
        $categories = \App\Models\Category::all();

        // Products query
        $products = \App\Models\Product::query();

        // Category filter
        if (request()->category) {
            $products->where('category_id', request()->category);
        }

        $products = $products->latest()->paginate(8); // 8 per page

        return view('frontend.shop', compact('products', 'categories'));
    }
}
