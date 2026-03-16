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
        Schema::create('orderheader', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clientId');
            $table->date('orderDate');
            $table->date('receivingDate');
            $table->integer('status');
            $table->string('lpo', length: 50)->default('');
            $table->string('dropOff', length: 100)->default('');
            $table->decimal('amount', total: 11, places: 2);
            $table->decimal('lineTotal', total: 11, places: 2);
            $table->string('currency', length: 20)->default('');
            $table->boolean('sendEmail')->default(false);
            $table->boolean('transferred')->default(false);
            $table->boolean('autoConfirm')->default(false);
            $table->dateTime('confirmDate')->default(date('Y-m-d', time()));
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
        Schema::dropIfExists('orderheader');
    }
};