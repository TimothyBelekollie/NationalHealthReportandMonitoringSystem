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
        Schema::create('health_centers', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("description")->nullable();
           
            $table->string("contactOne")->nullable();
            $table->string("contactTwo")->nullable();
            $table->string("emailOne")->nullable();
            $table->string("emailTwo")->nullable();
            $table->string("prifileImage")->nullable();
       
            $table->unsignedBigInteger('subdivision_id')->nullable();
            $table->foreign('subdivision_id')->references('id')->on('subdivisions')->onDelete('cascade');
            $table->unsignedBigInteger('health_center_type_id')->nullable();
            $table->foreign('health_center_type_id')->references('id')->on('health_center_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_centers');
    }
};
