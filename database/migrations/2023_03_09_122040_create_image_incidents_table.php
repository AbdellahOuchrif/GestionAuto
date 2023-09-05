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
        Schema::create('image_incidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_vehicule_id');
            $table->string('url_incident');
            $table->timestamps();
            $table->foreign('incident_vehicule_id')->references('id')->on('incident_vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_incidents');
    }
};
