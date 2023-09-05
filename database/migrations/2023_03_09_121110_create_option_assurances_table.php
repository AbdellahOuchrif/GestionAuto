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
        Schema::create('option_assurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assurance_id');
            $table->string('designation', 40);
            $table->text('details')->nullable();
            $table->timestamps();
            $table->foreign('assurance_id')->references('id')->on('assurances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_assurances');
    }
};
