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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etat_id');
            $table->unsignedBigInteger('type_vehicule_id');
            $table->unsignedBigInteger('model_vehicule_id');
            $table->unsignedBigInteger('couleur_vehicule_id');
            $table->unsignedBigInteger('transmission_vehicule_id');
            $table->integer('immatriculation_num');
            $table->char('immatriculation_lettre');
            $table->mediumInteger('immatriculation_region');
            $table->date('date_acquisition')->nullable();
            $table->tinyInteger('nbr_place')->nullable();
            $table->date('date_disponibilite')->nullable();
            $table->float('tarif');
            $table->integer('km_compteur');
            $table->string('unite', 10);// km ou heures
            $table->text('canvas_data')->nullable();
            $table->timestamps();
            $table->foreign('etat_id')->references('id')->on('etats')->onDelete('cascade');
            $table->foreign('type_vehicule_id')->references('id')->on('type_vehicules')->onDelete('cascade');
            $table->foreign('model_vehicule_id')->references('id')->on('model_vehicules')->onDelete('cascade');
            $table->foreign('couleur_vehicule_id')->references('id')->on('couleur_vehicules')->onDelete('cascade');
            $table->foreign('transmission_vehicule_id')->references('id')->on('transmission_vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
