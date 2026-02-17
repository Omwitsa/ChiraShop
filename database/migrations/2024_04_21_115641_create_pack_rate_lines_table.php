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
        Schema::create('pack_rate_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pack_rate_header_id')->constrained();
            $table->string('variety', length: 100);
            $table->smallInteger('len35');
            $table->smallInteger('len40');
            $table->smallInteger('len50');
            $table->smallInteger('len60');
            $table->smallInteger('len70');
            $table->smallInteger('len80');
            $table->smallInteger('len90');
            $table->smallInteger('len100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pack_rate_lines');
    }
};
