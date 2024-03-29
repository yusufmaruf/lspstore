<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productsFirst = Product::where('stok', '>', 0)->orderBy('created_at', 'desc')->take(10)->get();
        $categories = Category::all();
        $subtotal = 0;
        if (Auth::user()) {
            $cart = Cart::where('idUser', Auth::user()->id)->with('product')->get();
            foreach ($cart as $c) {
                $subtotal = $subtotal + $c->product->price * $c->quantity;
            }

            return view('pages.user.pages.home.index', compact('productsFirst',  'categories', 'cart', 'subtotal'));
        }
        return view('pages.user.pages.home.index', compact('productsFirst', 'categories'));
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
