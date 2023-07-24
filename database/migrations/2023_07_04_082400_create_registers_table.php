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
            $table->string('telefone');
            // todos os arquivos do cliente

            $table->text('identificacao_pf_pj');
            // $table->text('rg_cnh')->nullable();
            $table->text('procuracao');
            $table->text('fatura_da_uc');
            $table->text('padrao_de_entrada');

            $table->unsignedInteger('dijuntor_id');
            $table->foreign('dijuntor_id')->references('id')->on('dijuntors');

            $table->string('kwp')->nullable();
            $table->string('fotovoltaico')->nullable();
            $table->string('inversor')->nullable();
            $table->string('datasheet')->nullable();

            $table->text('observacao')->nullable();

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
