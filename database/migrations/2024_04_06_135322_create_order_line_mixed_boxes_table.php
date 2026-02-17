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
        Schema::create('orderlinemixedbox', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('OrderLineId')->constrained();
            $table->bigInteger('order_line_id');
            $table->bigInteger('VarietyId');
            $table->string('StemLength', length: 100);
            $table->integer('StemQty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlinemixedbox');
    }
};
