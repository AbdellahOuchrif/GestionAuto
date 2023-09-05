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
        Schema::create('etat_vehicules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->char('type');// etat vehicules : Lors de "Livraison" == "l" ou lors de "Retour" == "r"
            $table->integer('kms');
            $table->smallInteger('niveau_carburant');
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_vehicules');
    }
};
