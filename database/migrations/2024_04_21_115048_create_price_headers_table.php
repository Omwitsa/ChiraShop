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
        Schema::create('price_headers', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 100)->unique();
            $table->string('currency', length: 20)->nullable();
            $table->boolean('active')->default(true);
            $table->integer('clientCategoryId')->default(1);
            $table->dateTime('startDate')->default(date('Y-m-d', time()));
            $table->dateTime('endDate')->nullable();
            $table->string('notes')->nullable();
            $table->string('personnel', length: 50)->default('');
            $table->dateTime('dateCreated')->default(date('Y-m-d', time()));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_headers');
    }
};