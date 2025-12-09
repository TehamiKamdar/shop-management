<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'invoice_number',
        'invoice_date',
        'due_date',
        'subtotal',
        'discount',
        'tax',
        'shipping_cost',
        'grand_total',
        'paid_amount',
        'balance_amount',
        'payment_status',
        'payment_method',
        'notes',
        'attachment',
        'created_by',
    ];

    // Relationship: belongs to Purchase
    public function purchase()
    {
        return $this->belongsTo(Purchases::class);
    }

    // Relationship: Created By User
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Update balance automatically
    protected static function booted()
    {
        static::saving(function ($invoice) {
            $invoice->balance_amount = $invoice->grand_total - $invoice->paid_amount;

            if ($invoice->balance_amount <= 0) {
                $invoice->payment_status = 'paid';
            } elseif ($invoice->paid_amount > 0) {
                $invoice->payment_status = 'partial';
            } else {
                $invoice->payment_status = 'unpaid';
            }
        });
    }
}
