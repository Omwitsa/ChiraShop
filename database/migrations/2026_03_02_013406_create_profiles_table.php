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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('clientCode', length: 50)->unique();
            $table->string('playFrequency', length: 50)->default('');
            $table->string('club', length: 100)->default('');
            $table->string('courses', length: 100)->default('');
            $table->string('dropOff', length: 100)->default('');
            $table->string('preferredShower', length: 50)->default('');
            $table->string('kitSize', length: 50)->default('');
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
        Schema::dropIfExists('profiles');
    }
};
