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
    {// password
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Code', length: 50);
            $table->string('Type', length: 50);
            $table->mediumText('EmailRecepients');
            $table->string('DropOff');
            $table->string('Country', length: 50);
            $table->string('Price', length: 100)->default('');
            $table->string('Currency', length: 20)->default('');
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
