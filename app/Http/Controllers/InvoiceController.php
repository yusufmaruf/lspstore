<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $total = 0;

        $transactionDetail = TransactionDetail::where('transactions_id', $id)->with('product')->get();
        foreach ($transactionDetail as $t) {
            $total += $t->product->price * $t->quantity;
        }

        return view('pages.user.pages.invoices.index', ['transaction' => $transaction, 'total' => $total, 'transactionDetail' => $transactionDetail]);
    }
    public function cetak($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $total = 0;

        $transactionDetail = TransactionDetail::where('transactions_id', $id)->with('product')->get();
        foreach ($transactionDetail as $t) {
            $total += $t->product->price * $t->quantity;
        }


        $pdf = PDF::loadView('pages.user.pages.invoices.index', ['transaction' => $transaction, 'total' => $total, 'transactionDetail' => $transactionDetail])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
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
