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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->text('name')->required();
            $table->text('company_name')->nullable();
            $table->text('phone')->required();
            $table->text('email')->nullable();
            $table->text('address')->required();
            $table->int('opening_balance')->required();
            $table->timestamps();
        });
    }
};
