<?php

namespace Database\Seeders;

use App\Models\Suppliers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Ali Traders',
                'company_name' => 'Ali & Sons',
                'phone' => '03001234567',
                'email' => 'ali@traders.com',
                'address' => 'Karachi, Pakistan',
                'opening_balance' => 5000,
            ],
            [
                'name' => 'Kamdar Supplies',
                'company_name' => 'Kamdar Group',
                'phone' => '03112223344',
                'email' => 'info@kamdar.com',
                'address' => 'Lahore, Pakistan',
                'opening_balance' => 12000,
            ],
            [
                'name' => 'Hassan Wholesalers',
                'company_name' => 'Hassan Wholesale Co.',
                'phone' => '03215556677',
                'email' => 'sales@hassan.com',
                'address' => 'Islamabad, Pakistan',
                'opening_balance' => 8000,
            ],
        ];

        foreach ($suppliers as $supplier) {
            Suppliers::create($supplier);
        }
    }
}
