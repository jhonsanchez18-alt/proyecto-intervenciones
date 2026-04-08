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
        Schema::create('intervenciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('activo_id');
            $table->foreign('activo_id')->references('id')->on('activos')->onDelete('cascade');
            $table->dateTime('fecha_intervencion');
            $table->string('tipo_intervencion');
            $table->string('repuestos_utilizados')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('tecnico_id');
            $table->foreign('tecnico_id')->references('id')->on('tecnicos');
            $table->string('quien_recibe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervenciones');
    }
};
