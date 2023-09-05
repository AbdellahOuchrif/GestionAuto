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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicule_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('mode_paiement_id')->nullable();
            $table->unsignedBigInteger('organisation_id')->nullable();
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->float('tarif');
            $table->float('avance')->nullable();
            $table->text('description')->nullable();
            $table->string('reference', 40)->nullable();
            $table->timestamps();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('mode_paiement_id')->references('id')->on('mode_paiements')->onDelete('cascade');
            $table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
