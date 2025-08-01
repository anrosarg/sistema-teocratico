<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('congregations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('circuit_id')->constrained('circuits');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('congregations');
    }
};
