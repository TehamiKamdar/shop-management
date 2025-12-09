<?php

namespace App\Http\Controllers;

use App\Models\Purchases;

class PurchasesController extends Controller
{
    public function index()
    {
        return view('admin.purchases.index');
    }

    public function getPurchases()
    {
        $purchases = Purchases::with('supplier', 'invoices')->get();

        $data = $purchases->map(function ($purchase) {
            $totalPaid = $purchase->invoices->sum('paid_amount');

            return [
                'id' => $purchase->id,
                'invoice_no' => $purchase->invoice_no,
                'supplier' => [
                    'id' => $purchase->supplier?->id,
                    'name' => $purchase->supplier?->name,
                ],
                'purchase_date' => $purchase->purchase_date->format('Y-m-d'),
                'due_date' => $purchase->due_date?->format('Y-m-d'),
                'grand_total' => (float) $purchase->grand_total,
                'paid' => (float) $totalPaid,
                'balance' => (float) ($purchase->grand_total - $totalPaid),
                'status' => $purchase->status,
            ];
        });

        // Ensure $data is an array even if empty
        return response()->json([
            'data' => $data->values(), // ->values() converts collection to array
            'total' => $data->count(),
            'message' => 'OK',
        ]);
    }
}
