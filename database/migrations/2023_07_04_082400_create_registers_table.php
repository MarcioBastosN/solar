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
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

            $table->enum('tipo_pessoa', ['pf', 'pj'])->default('pf');
            $table->string('telefone');
            $table->string('nome');
            // todos os arquivos do cliente
            $table->text('corrente_disjuntor');

            $table->string('kwp')->nullable();
            $table->string('fotovoltaico')->nullable();
            $table->string('inversor')->nullable();

            $table->unsignedInteger('dijuntor_id');
            $table->foreign('dijuntor_id')->references('id')->on('dijuntors')->onDelete("cascade");

            $table->text('observacao')->nullable();

            $table->timestamps();
        });
        // $table->string('datasheet_inversor')->nullable();
        // $table->string('datasheet_modulo')->nullable();
        // $table->text('rg_cnh');
        // $table->text('fatura_da_uc');
        // $table->text('identificacao_pf_pj');
        // $table->text('procuracao');
        // $table->string('fatura_beneficiaria');
        // $table->string('cnh_socio')->nullable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('registers', function (Blueprint $table) {
        //     $table->dropForeign('dijuntor_id');
        //     $table->dropForeign('user_id');
        // });

        Schema::dropIfExists('registers');
    }
};
