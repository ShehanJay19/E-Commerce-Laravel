<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->query('category');

        $query = Product::query()->with('category')
            ->where('status', 'active')
            ->orderByDesc('id');

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $products = $query->paginate(12);
        $categories = Category::orderBy('name')->get();

        return view('catalog.index', compact('products', 'categories', 'categorySlug'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->with('category')->firstOrFail();
        return view('catalog.show', compact('product'));
    }
}
