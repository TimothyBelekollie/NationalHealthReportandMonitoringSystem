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
        Schema::create('health_center_types', function (Blueprint $table) {
            $table->id();
            $table->string("type")->unique();
            $table->unsignedBigInteger('health_center_id');
            $table->foreign('health_center_id')->references('id')->on('health_centers');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_center_types');
    }
};
