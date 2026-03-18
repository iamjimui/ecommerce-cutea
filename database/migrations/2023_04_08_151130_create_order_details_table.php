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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('products_id')->unsigned()->index()->nullable();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('product_sizes_id')->unsigned()->index()->nullable();
            $table->foreign('product_sizes_id')->references('id')->on('product_sizes')->onDelete('cascade');
            $table->bigInteger('toppings_id')->unsigned()->index()->nullable();
            $table->foreign('toppings_id')->references('id')->on('toppings')->onDelete('cascade');
            $table->bigInteger('orders_id')->unsigned()->index()->nullable();
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
            $table->double('price', 15, 2)->default(0.0);
            $table->double('toppings_price', 15, 2)->default(0.0);
            $table->integer('products_quantity');
            $table->integer('sugar_quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_toppings_orders');
    }
};
