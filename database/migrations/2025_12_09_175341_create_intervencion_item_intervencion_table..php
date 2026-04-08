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
        Schema::create('intervencion_itenaires', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('intervencion_id');
            $table->foreign('intervencion_id')->references('id')->on('intervencions')->onDelete('cascade');
            $table->unsignedBigInteger('iten_intervencion_aires_id');
            $table->foreign('iten_intervencion_aires_id')->references('id')->on('iten_intervencion_aires')->onDelete('cascade');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervencion_itenaires');
    }
};
