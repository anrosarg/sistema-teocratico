<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->foreignId('circuit_id')->constrained('circuits');
            $table->foreignId('congregation_id')->constrained('congregations');
            $table->foreignId('group_id')->constrained('groups');
            $table->enum('status', ['baptized', 'not_baptized'])->default('baptized');
            $table->enum('condition', ['exemplary', 'not_exemplary'])->default('exemplary');
            $table->foreignId('privilege_id')->constrained('privileges');
            $table->foreignId('assignment_id')->constrained('assignments');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publishers');
    }
};
