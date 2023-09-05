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
        Schema::create('entretient_delais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_entretien_id');
            $table->unsignedBigInteger('vehicule_id');
            $table->mediumInteger('km_visee')->nullable();// combien de km entre chaque entretient
            $table->mediumInteger('km_rappel')->nullable(); // combien de km reste avant d'arriver au km_visee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entretient_delais');
    }
};
