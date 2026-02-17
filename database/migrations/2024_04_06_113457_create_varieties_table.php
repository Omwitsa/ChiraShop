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
        Schema::create('variety', function (Blueprint $table) {
            $table->id();
            $table->string('VarietyName', length: 100)->unique(); 
            $table->string('VarietyCode', length: 50)->unique();
            $table->string('FlowerType', length: 50);
            $table->string('Colour', length: 50);
            $table->boolean('Active')->default(true);
            $table->string('Category', length: 100);
            $table->string('SubCategory', length: 50);
            $table->integer('MinimumOrder')->default(0);
            $table->string('picUrl');
            $table->string('AltVarieties', length: 100); 
            $table->boolean('InStock')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variety');
    }
};
