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
        Schema::create('incident_vehicule_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_vehicule_id');
            $table->string('piece')->nullable();
            $table->timestamps();
            $table->foreign('incident_vehicule_id')->references('id')->on('incident_vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_vehicule_details');
    }
};
