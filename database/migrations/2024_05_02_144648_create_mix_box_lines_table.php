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
        Schema::create('mix_box_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mix_box_id')->constrained();
            $table->string('variety', length: 100);
            $table->smallInteger('stems');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mix_box_lines');
    }
};
