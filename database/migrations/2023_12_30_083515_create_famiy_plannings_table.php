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
        Schema::create('famiy_plannings', function (Blueprint $table) {
            $table->id();
            Schema::create('patients', function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->string("dob");
                $table->string("type");
                $table->string("status")->default('first');
                $table->string("address");
                
                $table->unsignedBigInteger('health_center_id')->nullable();
                $table->foreign('health_center_id')->references('id')->on('health_centers');
                $table->timestamps();
            });
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('famiy_plannings');
    }
};
