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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicule_id');//Quelle est la vehicule louer ?
            $table->unsignedBigInteger('client_id');// Quel client ? 
            $table->unsignedBigInteger('reservation_id')->nullable();// Est ce que cette location a ete deja reserver ?
            $table->unsignedBigInteger('conducteur_id')->nullable();// Est ce qu'il y a un autre conducteur qui va conduire cette voiture ?
            $table->date('client_date_maroc')->nullable();
            $table->date('conducteur_date_maroc')->nullable();
            $table->dateTime('date_depart');
            $table->string('lieu_depart');
            $table->dateTime('date_retour');
            $table->string('lieu_retour');
            $table->text('canvas_data_livraison')->nullable();
            $table->text('observation_assurance')->nullable();
            $table->boolean('location_retour')->default(0);//this is to check if the location has been verified after the client returns the car or not.
            $table->timestamps();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('conducteur_id')->references('id')->on('conducteurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
