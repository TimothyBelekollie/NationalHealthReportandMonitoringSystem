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
        Schema::create('birth_events', function (Blueprint $table) {
            $table->id();
            $table->dateTime('event_date');
            $table->json("baby_gender");
            $table->string("baby_number")->nullable();
            $table->string("mother_dob_at_delivery")->nullable();
            
            $table->unsignedBigInteger('health_center_id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('health_center_id')->references('id')->on('health_centers');
            $table->foreign('patient_id')->references('id')->on('patients');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_events');
    }
};
