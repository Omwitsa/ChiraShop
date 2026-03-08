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
            $table->bigInteger('client');
            $table->date('receivingDate');
            $table->string('lpo', length: 50);
            $table->integer('status');
            $table->integer('isSendEmail');
            $table->string('confirmUrl');
            $table->integer('dropOffId');
            $table->integer('isTransferred');
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