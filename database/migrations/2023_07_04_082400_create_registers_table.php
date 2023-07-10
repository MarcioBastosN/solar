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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            // todos os arquivos do cliente
            // definir junto no model

            $table->unsignedInteger('dijuntor_id');
            $table->foreign('dijuntor_id')->references('id')->on('dijuntors');

            $table->unsignedInteger('user_kit_id')->nullable();
            $table->foreign('user_kit_id')->references('id')->on('user_kits');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
