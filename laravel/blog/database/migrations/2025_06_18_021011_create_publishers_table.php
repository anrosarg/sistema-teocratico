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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->enum('type', ['bautizado', 'no bautizado']);
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('congregation_id')->constrained('congregations')->onDelete('cascade');
            $table->foreignId('circuit_id')->constrained('circuits')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishers');
    }
};
