<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtotal = 0;
        if (Auth::user()) {
            $cart = Cart::where('idUser', Auth::user()->id)->with('product')->get();
            foreach ($cart as $c) {
                $subtotal = $subtotal + $c->product->price * $c->quantity;
            }
            return view('pages.user.pages.cart.index', compact('cart', 'subtotal'));
        }
        return view('/');
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
    public function store(Request $request, $id)
    {
        $data = [
            'idProduct' => $id,
            'idUser' => Auth::user()->id,
            'quantity' => $request->quantity
        ];
        Cart::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Cart::findorFail($id);
        $item->quantity = $request->quantity;
        $item->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Cart::findorFail($id);
        $item->delete();
        return redirect()->back();
    }
}
