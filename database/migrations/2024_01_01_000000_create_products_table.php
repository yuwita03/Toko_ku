<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('barcode')->nullable();
            $table->string('category')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('sell_price')->default(0);
            $table->integer('cost_price')->default(0);
            $table->integer('profit')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable(); // Tambahkan ini!
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
