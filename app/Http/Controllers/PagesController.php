<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // hij haalt alle $categories uit database en geeft ze mee naar de view met compact
        // product::limit(6) is dat hij alleen 6 producten pakt
        $categories = Category::all();
        $products = Product::limit(4)->get();

        return view('index', compact('categories', 'products'));
    }

    public function categories()
    {
        // hier haalt hij alle categories uit database en verstuurd ze naar view categories
        $categories = Category::all();

        return view('categories', compact('categories'));
    }


    public function products($category_slug = null)
{
    if ($category_slug == null) {
        $category = null;
        $products = Product::all();

        $categories = Category::all();
    } else {
        $category = Category::where('slug', $category_slug)->first();
        $products = Product::where('category_id', $category->id)->get();

        $categories = Category::where('id', '!=', $category->id)->get();
    }

    return view('products', compact('products', 'categories','category'));
}
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();

        return view('product', compact('product','categories'));
    }

    public function cart()
    {
        return view('cart');
    }
}
