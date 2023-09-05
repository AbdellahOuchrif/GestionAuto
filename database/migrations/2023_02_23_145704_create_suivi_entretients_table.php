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
        Schema::create('suivi_entretients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_entretien_id');
            $table->unsignedBigInteger('vehicule_id');
            $table->date('date');
            $table->integer('km_actuel');
            $table->integer('km_prochain');
            $table->timestamps();
            $table->foreign('type_entretien_id')->references('id')->on('type_entretiens')->onDelete('cascade');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivi_entretients');
    }
};
