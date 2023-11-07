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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("phone");
            $table->string("email")->nullable();
            $table->string("specialization")->nullable();
            $table->string("message")->nullable();
            $table->string("status")->nullable();
            $table->string("date")->nullable();
            $table->unsignedBigInteger('health_center_id');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('health_center_id')->references('id')->on('health_centers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
