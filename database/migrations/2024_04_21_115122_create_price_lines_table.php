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
            $table->string('variety', length: 100);
            $table->decimal('len35', total: 8, places: 2);
            $table->decimal('len40', total: 8, places: 2);
            $table->decimal('len50', total: 8, places: 2);
            $table->decimal('len60', total: 8, places: 2);
            $table->decimal('len70', total: 8, places: 2);
            $table->decimal('len80', total: 8, places: 2);
            $table->decimal('len90', total: 8, places: 2);
            $table->decimal('len100', total: 8, places: 2);

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
