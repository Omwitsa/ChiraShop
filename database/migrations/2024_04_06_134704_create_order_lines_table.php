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
            $table->string('VarietyCode', length: 50);
            $table->string('VarietyName', length: 100);
            $table->string('subCategory', length: 50);
            $table->string('category', length: 100);
            $table->string('ClientDivision', length: 100);
            $table->string('Length', length: 20);
            $table->string('BoxType', length: 20);
            $table->string('StemQty', length: 20);
            $table->string('PackRate', length: 20);
            $table->string('Boxes', length: 20);
            $table->string('Farm', length: 100)->default('');
            $table->string('BoxMarking')->default('');
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
