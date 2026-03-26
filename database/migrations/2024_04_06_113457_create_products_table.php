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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 100)->unique(); 
            $table->string('code', length: 50)->unique();
            $table->string('category', length: 100);
            $table->string('barcode', length: 20)->default('');
            $table->boolean('active')->default(true);
            $table->integer('minimumOrder')->default(0);
            $table->string('picUrl')->default('');
            $table->boolean('inStock')->default(true);
            $table->boolean('isAddOn')->default(false);
            $table->string('reasonToLove')->default('');
            $table->string('description')->default('');
            $table->string('olFactoryNotes')->default('');
            $table->string('ingredients')->default('');
            $table->string('howToUse')->default('');
            $table->string('claims')->default('');
            $table->string('origin')->default('');
            $table->string('volume')->default('');
            $table->string('shipmentTime')->default('');
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
        Schema::dropIfExists('products');
    }
};
