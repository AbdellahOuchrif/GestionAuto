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
        Schema::create('assurance_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            // Explanation of why i used option_id and assurance_id even tho they're related 
            /////
            // An assurance doesn't always have options so the assurance details will be left with no option, which is not possible in our case because we have to have 
            // some kind of inssurance in a location , that's why i made option_id nullable and added assurance_id, also nullable as it is not needed when we already have an option.
            $table->unsignedBigInteger('option_assurance_id')->nullable();
            $table->unsignedBigInteger('assurance_id')->nullable();
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('option_assurance_id')->references('id')->on('option_assurances')->onDelete('cascade');
            $table->foreign('assurance_id')->references('id')->on('assurances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assurance_details');
    }
};
