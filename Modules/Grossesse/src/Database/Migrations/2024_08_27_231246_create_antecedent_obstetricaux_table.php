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
        Schema::create('antecedent_obstetricaux', function (Blueprint $table) {
            $table->id();
            $table->string('issue_grossesse');
            $table->string('mode_accouchement');
            $table->text('complications')->nullable();
            // $table->foreignId('id_grossesse')->constrained('grossesses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedent_obstetricaux');
    }
};
