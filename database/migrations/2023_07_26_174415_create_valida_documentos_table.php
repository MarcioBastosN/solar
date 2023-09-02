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

            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_documentos');

            $table->enum('documento', ['identificacao_pf_pj', 'procuracao', 'padrao_de_entrada', 'fatura_da_uc', 'datasheet']);
            $table->string('obs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('valida_documentos', function (Blueprint $table) {
            // $table->dropForeign('status_id');
            // $table->dropForeign('register_id');
        });
        Schema::dropIfExists('valida_documentos');
    }
};
