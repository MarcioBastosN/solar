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
        Schema::create('dados_projects', function (Blueprint $table) {
            $table->id();

            // verificar os demais e adicionar no model tambem

            $table->unsignedInteger('projects_id');
            $table->foreign('projects_id')->references('id')->on('projects');

            // fase do projeto
            $table->unsignedInteger('status_project_id');
            $table->foreign('status_project_id')->references('id')->on('status_projets');

            // arquivo
            $table->text('documento')->nullable();
            // notas
            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_projects');
    }
};
