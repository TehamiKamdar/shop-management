<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'invoice_no',
        'purchase_date',
        'due_date',
        'subtotal',
        'discount',
        'tax',
        'shipping_cost',
        'grand_total',
        'status',
        'created_by',
    ];

    // Supplier relationship
    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }

    // Purchase Items relationship
    public function items()
    {
        return $this->hasMany(PurchaseItems::class);
    }

    // Purchase Invoices relationship
    public function invoices()
    {
        return $this->hasMany(PurchaseInvoices::class);
    }

    // Created By (User)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Auto-generate internal invoice number
    public static function boot()
    {
        parent::boot();

        static::creating(function ($purchase) {
            if (!$purchase->invoice_no) {
                $lastPurchase = Purchases::latest()->first();
                $nextNumber = $lastPurchase ? $lastPurchase->id + 1 : 1;
                $purchase->invoice_no = 'PO-' . date('Y') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
