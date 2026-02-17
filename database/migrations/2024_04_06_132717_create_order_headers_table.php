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
            $table->bigInteger('ClientId');
            $table->dateTime('DateCreated');
            $table->date('ReceivingDate');
            $table->string('LpoNo', length: 50);
            $table->integer('Status');
            $table->string('Farm', length: 100);
            $table->integer('Type');
            $table->integer('IsSendEmail');
            $table->string('confirmUrl');
            $table->integer('DropOffId');
            $table->integer('IsTransferred');
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
