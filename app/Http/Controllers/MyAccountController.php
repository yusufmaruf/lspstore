<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::where('idUser', Auth::user()->id)->get();
        $account = auth()->user();
        $subtotal = 0;
        if (Auth::user()) {
            $cart = Cart::where('idUser', Auth::user()->id)->with('product')->get();
            foreach ($cart as $c) {
                $subtotal = $subtotal + $c->product->price * $c->quantity;
            }
            return view('pages.user.pages.account.index', compact('transaction', 'account', 'cart', 'subtotal'));
        }
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
    public function update(Request $request,  $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);
        $item->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
