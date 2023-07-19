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
        Schema::create('valida_documentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('register_id');
            $table->foreign('register_id')->references('id')->on('registers');

            $table->unsignedInteger('rg_cnh')->nullable();
            $table->foreign('rg_cnh')->references('id')->on('status_documentos');

            $table->unsignedInteger('cnpj')->nullable();
            $table->foreign('cnpj')->references('id')->on('status_documentos');

            $table->unsignedInteger('procuracao')->nullable();
            $table->foreign('procuracao')->references('id')->on('status_documentos');

            $table->unsignedInteger('fatura_da_uc')->nullable();
            $table->foreign('fatura_da_uc')->references('id')->on('status_documentos');

            $table->unsignedInteger('padrao_de_entrada')->nullable();
            $table->foreign('padrao_de_entrada')->references('id')->on('status_documentos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valida_documentos');
    }
};
