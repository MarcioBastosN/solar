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

            $table->unsignedInteger('status_rg_cnh')->nullable();
            $table->foreign('status_rg_cnh')->references('id')->on('status_documentos');

            $table->unsignedInteger('status_cnpj')->nullable();
            $table->foreign('status_cnpj')->references('id')->on('status_documentos');

            $table->unsignedInteger('status_procuracao')->nullable();
            $table->foreign('status_procuracao')->references('id')->on('status_documentos');

            $table->unsignedInteger('status_fatura_da_uc')->nullable();
            $table->foreign('status_fatura_da_uc')->references('id')->on('status_documentos');

            $table->unsignedInteger('status_padrao_de_entrada')->nullable();
            $table->foreign('status_padrao_de_entrada')->references('id')->on('status_documentos');

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
