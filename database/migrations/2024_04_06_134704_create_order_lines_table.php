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
        Schema::create('orderline', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('order_header_id')->constrained();
            $table->bigInteger('order_header_id');
            $table->bigInteger('productId');
            $table->decimal('orderQuantity', total: 8, places: 2);
            $table->decimal('unit_price', total: 11, places: 2);
            $table->decimal('price', total: 11, places: 2);
            $table->decimal('price', total: 11, places: 2);
            $table->string('notes')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderline');
    }
};