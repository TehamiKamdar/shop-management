<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'unit_price',
        'total',
    ];

    // Relationship to Purchase
    public function purchase()
    {
        return $this->belongsTo(Purchases::class);
    }

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    // Automatically calculate total on save
    protected static function booted()
    {
        static::saving(function ($item) {
            $item->total = $item->quantity * $item->unit_price;
        });
    }
}
