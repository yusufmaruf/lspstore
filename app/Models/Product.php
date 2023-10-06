<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProduct';
    protected $fillable = [
        'name', 'slug', 'image', 'price', 'stok', 'idCategory', 'desc'
    ];

    // relasi 
    public function category()
    {
        return $this->belongsTo(Category::class, 'idCategory', 'idCategory');
    }
}
