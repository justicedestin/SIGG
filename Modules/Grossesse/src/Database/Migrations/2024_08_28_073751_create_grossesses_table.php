<?php

namespace Modules\Grossesse\src\Database\Migrations;

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
        Schema::create('grossesses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_derniere_regle')->nullable();
            $table->date('date_probable_debut')->nullable();
            $table->date('date_terme_echographie')->nullable();
            $table->date('date_prevue_accouchement')->nullable();
            $table->integer('csg_gestite')->nullable();
            $table->integer('csg_parite')->nullable();
            $table->boolean('dormez_sous_milda')->default(false);
            $table->enum('situation_familiale', ['Mariée','Célibataire','Vivant seule','Vivant en couple']);
            $table->integer('nbr_enfant_au_foyer')->nullable();
            // $table->foreignId('id_patient')->constrained('patients');
            // $table->foreignId('id_structure')->constrained('structures');
            // $table->foreignId('id_agent')->constrained('agents');
            // $table->foreignId('id_prestation')->constrained('prestations');
            $table->boolean('af_diabete')->default(false);
            $table->boolean('af_hypertension_arterielle')->default(false);
            $table->boolean('af_maladies_hereditaires')->default(false);
            $table->boolean('autres_af');
            $table->string('af_a_preciser')->nullable();
            $table->boolean('am_diabete');
            $table->boolean('am_hypertension_arterielle');
            $table->boolean('am_drepanocytose');
            $table->boolean('am_vih');
            $table->boolean('am_hepatite_virale');
            $table->boolean('am_herpes_genital');
            $table->boolean('am_infection_urinaire_recidivante');
            $table->boolean('am_allergie_aux_medicaments');
            $table->boolean('am_prise_permanente_de_medicaments');
            $table->boolean('am_phlebites');
            $table->boolean('autres_am');
            $table->string('am_a_preciser')->nullable();
            $table->boolean('ac_gynecologiques');
            $table->string('acg_a_preciser')->nullable();
            $table->boolean('autres_ac');
            $table->string('ac_a_preciser')->nullable();
            $table->boolean('ag_cycle_menstruel');
            $table->boolean('ag_infertilite');
            $table->boolean('autres_ag');
            $table->string('ag_a_preciser')->nullable();
            $table->string('ag_dernier_type_de_contraception')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grossesses');
    }
};
