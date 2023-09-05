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
        Schema::create('prolongations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->dateTime('date_depart_prolongation')->nullable();
            $table->dateTime('date_retour_prolongation')->nullable();
            $table->string('lieu_depart_prolongation')->nullable();
            $table->string('lieu_retour_prolongation')->nullable();
            $table->float('autre_frais_prolongation')->nullable();
            $table->string('nature')->nullable();
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prolongations');
    }
};
