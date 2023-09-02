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
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id();

            // cliente
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete("cascade");

            $table->unsignedInteger('request_id');
            $table->foreign('request_id')->references('id')->on('registers')->onDelete("cascade");

            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_projets')->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('user_requests', function (Blueprint $table) {
        //     $table->dropForeign('customer_id');
        //     $table->dropForeign('request_id');
        //     $table->dropForeign('status_id');
        // });
        Schema::dropIfExists('user_requests');
    }
};
