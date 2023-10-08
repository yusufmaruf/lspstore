<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $subtotal = 0;
        if (Auth::user()) {
            $cart = Cart::where('idUser', Auth::user()->id)->with('product')->get();
            foreach ($cart as $c) {
                $subtotal = $subtotal + $c->product->price * $c->quantity;
            }
            $tax = $subtotal * 0.1;
            $total = $subtotal + $tax;
            return view('pages.user.pages.checkout.index', compact('user', 'total', 'tax',  'cart', 'subtotal'));
        }
        return view('');
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
        $user = Auth::user();
        $total_price = $request->total_price;
        $cart = Cart::where('idUser', Auth::user()->id)->with('product')->get();

        $transaction = Transaction::create([
            'idUser' => Auth::user()->id,
            'total_price' => $total_price,
            'transaction_status' => 'PENDING',
            'pay' => $request->pay
        ]);
        $idtransaction = Transaction::latest('id')->first();
        foreach ($cart as $c) {
            $transaction_detail = TransactionDetail::create([
                'transactions_id' => $idtransaction->id,
                'idProduct' => $c->product->idProduct,
                'quantity' => $c->quantity,
                'price' => $c->product->price * $c->quantity,
            ]);
        }
        Cart::where('idUser', Auth::user()->id)->delete();
        return redirect()->route('homes.index');
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
