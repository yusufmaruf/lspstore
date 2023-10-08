<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('stok', '>', 0)->paginate(32);
        $subtotal = 0;
        if (Auth::user()) {
            $cart = Cart::where('idUser', Auth::user()->id)->with('product')->get();
            foreach ($cart as $c) {
                $subtotal = $subtotal + $c->product->price * $c->quantity;
            }
            return view('pages.user.pages.categories.index', compact('products', 'categories', 'cart', 'subtotal'));
        }
        return view('pages.user.pages.categories.index', ['categories' => $categories, 'products' => $products]);
    }
    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('idCategory', $category->idCategory)->paginate(32);
        $subtotal = 0;
        if (Auth::user()) {
            $cart = Cart::where('idUser', Auth::user()->id)->with('product')->get();
            foreach ($cart as $c) {
                $subtotal = $subtotal + $c->product->price * $c->quantity;
            }
            return view('pages.user.pages.categories.index', compact('products', 'categories', 'cart', 'subtotal'));
        }
        return view('pages.user.pages.categories.index', ['categories' => $categories, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
