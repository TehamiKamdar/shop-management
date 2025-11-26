<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name')->required();
            $table->text('sku')->nullable();
            $table->float('purchase_price', 8, 2)->required();
            $table->float('sale_price', 8, 2)->required();
            $table->float('quantity', 5, 2)->required();
            $table->float('unit', 5, 2)->required();
            $table->timestamps();
        });
    }
};
