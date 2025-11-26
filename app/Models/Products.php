<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'sku', 'purchase_price', 'sale_price', 'quantity', 'unit'];
    protected $casts = [
    'purchase_price' => 'float',
    'sale_price'     => 'float',
    'quantity'       => 'float',
];
}
