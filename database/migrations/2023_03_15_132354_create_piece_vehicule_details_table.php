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
        Schema::create('piece_vehicule_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('piece_vehicule_id');
            $table->unsignedBigInteger('etat_vehicule_id');
            $table->timestamps();
            $table->foreign('piece_vehicule_id')->references('id')->on('piece_vehicules')->onDelete('cascade');
            $table->foreign('etat_vehicule_id')->references('id')->on('etat_vehicules')->onDelete('cascade');
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piece_vehicule_details');
    }
};
