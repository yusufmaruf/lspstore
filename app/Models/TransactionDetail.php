<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transactions_id',
        'idProduct',
        'quantity',
        'price',
    ];
    public function product()
    {
        return $this->hasOne(Product::class, 'idProduct', 'idProduct');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }
}
