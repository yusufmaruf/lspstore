<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'idProduct', 'idUser', 'quantity'
    ];
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'idProduct');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
