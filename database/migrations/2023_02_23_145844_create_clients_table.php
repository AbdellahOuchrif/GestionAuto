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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet', 100);
            $table->date('date_naissance')->nullable();
            $table->char('sexe')->nullable();// M ou F
            $table->string('lieu_naissance', 30)->nullable();//
            $table->string('nationalite', 30)->nullable();//
            $table->string('pays', 30)->nullable();
            $table->string('ville', 30)->nullable();
            $table->string('adresse', 100)->nullable();
            $table->string('tel', 30)->nullable();
            $table->string('tel_2', 30)->nullable();
            $table->string('email', 100)->nullable();
            //$table->string('identite', 50)->nullable();
            //$table->date('identite_delivre')->nullable();
            $table->string('num_cin', 50)->nullable();//
            $table->date('cin_delivre')->nullable();//
            $table->date('cin_validite')->nullable();//
            $table->string('num_passeport', 50)->nullable();//
            $table->date('passeport_delivre')->nullable();//
            $table->date('passeport_validite')->nullable();//
            $table->string('type_permis', 5)->nullable();
            $table->string('num_permis', 50)->nullable();
            $table->date('permis_delivre')->nullable();
            $table->date('permis_validite')->nullable();//
            $table->string('photo')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
