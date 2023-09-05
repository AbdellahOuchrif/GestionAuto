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
        Schema::create('facturations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('mode_paiement_id');
            //$table->unsignedBigInteger('franchise_mode_paiement_id');
            $table->unsignedBigInteger('organisation_id')->nullable();
            $table->unsignedBigInteger('franchise_organisation_id')->nullable();
            $table->char('type');//facturation livraison "l" ou retour "r"
            $table->smallInteger('nbr')->nullable();
            $table->float('prix')->nullable();//Total is going to be calculated automatically in the pages and not updated
            $table->string('unite', 10)->nullable();
            $table->float('frais_livraison')->default('0');
            $table->float('frais_reprise')->default('0');
            $table->float('remise')->default('0');
            $table->string('reference', 40)->nullable();
            $table->float('tva')->default('0');// en pourcentage, la valeur sera egale a celle dans la table divers, mais je n'utilise 
            //pas foreign key car la valeur TVA peut etre changer apres la facturation et quand en reverra cette facturation le calcul sera faux.
            $table->float('acompte')->default('0');//c'est l'avance que le client a donner
            $table->float('franchise')->default('0');
            $table->float('pourcentage_franchise')->default('0');
            $table->string('reference_franchise', 40)->nullable();
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('mode_paiement_id')->references('id')->on('mode_paiements')->onDelete('cascade');
            //$table->foreign('franchise_mode_paiement_id')->references('id')->on('mode_paiements')->onDelete('cascade');
            $table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('cascade');
            $table->foreign('franchise_organisation_id')->references('id')->on('organisations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturations');
    }
};
