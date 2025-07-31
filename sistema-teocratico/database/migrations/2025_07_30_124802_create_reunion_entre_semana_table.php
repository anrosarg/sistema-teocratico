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
        Schema::create('reunion_entre_semana', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('acomodador_puerta_id')->constrained('publishers')->onDelete('cascade');
            $table->foreignId('acomodador_auditorio_id')->constrained('publishers')->onDelete('cascade');
            $table->foreignId('microfono_1_id')->constrained('publishers')->onDelete('cascade');
            $table->foreignId('microfono_2_id')->constrained('publishers')->onDelete('cascade');
            $table->foreignId('encargado_audio_id')->constrained('publishers')->onDelete('cascade');
            $table->foreignId('encargado_video_id')->constrained('publishers')->onDelete('cascade');
            $table->foreignId('plataforma_id')->constrained('publishers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunion_entre_semana');
    }
};
