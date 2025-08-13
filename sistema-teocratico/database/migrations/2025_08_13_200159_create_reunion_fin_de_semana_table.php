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
        Schema::create('reunion_fin_de_semana', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');

            // Presidente (select desde publishers con asignación "presidente")
            $table->foreignId('presidente_id')->constrained('publishers')->onDelete('cascade');

            // Orador, Congregación, Tema, La Atalaya (campos libres)
            $table->string('orador');
            $table->string('congregacion');
            $table->string('tema', 256);
            $table->string('la_atalaya');

            // Lector (select desde publishers con asignación "lector")
            $table->foreignId('lector_id')->constrained('publishers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunion_fin_de_semana');
    }
};
