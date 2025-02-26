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
        Schema::create('fatura_beneficiarias', function (Blueprint $table) {
            $table->id();

            // 'register_id',
            $table->unsignedInteger('register_id');
            $table->foreign('register_id')->references('id')->on('registers')->onDelete("cascade");
            // 'path',
            $table->string('path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fatura_beneficiarias');
    }
};
