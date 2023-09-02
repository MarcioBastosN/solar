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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // gerente do projeto
            $table->unsignedInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('users');

            //id do usuario solicitante
            $table->unsignedInteger('user_request_id');
            $table->foreign('user_request_id')->references('id')->on('user_requests');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('projects', function (Blueprint $table) {
        //     $table->dropForeign('manager_id');
        //     $table->dropForeign('user_request_id');
        // });
        Schema::dropIfExists('projects');
    }
};
