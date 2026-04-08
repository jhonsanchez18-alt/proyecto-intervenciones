<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ubicacions', function (Blueprint $table) {
            // Primero eliminar la foreign key
            $table->dropForeign(['seccion_id']);

            // Luego eliminar la columna
            $table->dropColumn('seccion_id');
        });
    }

    public function down(): void
    {
        Schema::table('ubicacions', function (Blueprint $table) {
            $table->unsignedBigInteger('seccion_id')->nullable();
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade');
        });
    }
};
