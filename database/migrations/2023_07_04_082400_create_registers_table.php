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

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('tipo_pessoa', ['pf', 'pj'])->default('pf');
            // todos os arquivos do cliente

            $table->text('cnpj')->nullable();
            $table->text('rg_cnh')->nullable();
            $table->text('procuracao')->nullable();
            $table->text('fatura_da_uc')->nullable();
            $table->text('padrao_de_entrada')->nullable();

            $table->unsignedInteger('dijuntor_id')->nullable();
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
