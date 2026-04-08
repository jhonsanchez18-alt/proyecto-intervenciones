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
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');

            $table->string('descripcion')->nullable();

            $table->unsignedBigInteger('seccion_id');
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade');

            $table->unsignedBigInteger('ubicacion_id');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacions')->onDelete('cascade');

            $table->unsignedBigInteger('marca_id')->nullable(); 
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('set null');

            $table->string('modelo')->nullable();
            $table->string('numerodeserie')->nullable()->unique();  
            $table->dateTime('fechacompra')->nullable();
            $table->decimal('valorcompra', 10, 2)->nullable();

            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('set null');

            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('set null');
            
            $table->string('identificadorunico')->unique();
            $table->dateTime('fecharegistro')->nullable();
            $table->string('observaciones')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
};
