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
        Schema::create('price_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_header_id')->constrained();
            $table->bigInteger('productId');
            $table->string('client_category')->default('');
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
        Schema::dropIfExists('price_lines');
    }
};