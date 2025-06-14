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
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('sell_price');
            $table->integer('cost_price')->default(0); // tambahkan jika ingin simpan cost_price
            $table->integer('profit')->default(0);     // tambahkan jika ingin simpan profit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};
