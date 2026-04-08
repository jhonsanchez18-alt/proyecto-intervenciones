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
        Schema::create('intervencion_repuestos', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('intervencion_id');
            $table->foreign('intervencion_id')->references('id')->on('intervenciones')->onDelete('cascade');
            $table->unsignedBigInteger('repuesto_id');
            $table->foreign('repuesto_id')->references('id')->on('repuestos')->onDelete('cascade');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervencion_repuestos');
    }
};
