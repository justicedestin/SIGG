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
        Schema::create('antecedent_parite', function (Blueprint $table) {
            $table->increments("id");
            $table->enum("sexe",["M","F"]);
            $table->enum("type_naissance",["Ne_Vivant","Ne_Mort"]);
            $table->enum("cas_deces",["Oui","Non"]);
            $table->integer("age_deces")->nullable;
            $table->string("cause_deces")->nullable;
            $table->integer("id_grossesse")->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedent_parite');
    }
};
