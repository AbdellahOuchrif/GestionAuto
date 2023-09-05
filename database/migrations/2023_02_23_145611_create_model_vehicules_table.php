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
        Schema::create('model_vehicules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marque_vehicule_id');
            $table->string('model');
            $table->timestamps();
            $table->foreign('marque_vehicule_id')->references('id')->on('marque_vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_vehicules');
    }
};
