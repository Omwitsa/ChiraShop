<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\Enums\ClientGroups;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {// password
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('code', length: 50)->unique();
            $table->string('name');
            $table->string('type', length: 50);
            $table->string('group', length: 50)->default(ClientGroups::GENERAL->value);
            $table->string('emailRecepients', length: 200)->default('');
            $table->string('price', length: 100)->default('');
            $table->string('currency', length: 20)->default('');
            $table->string('password');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('clients');
    }
};
