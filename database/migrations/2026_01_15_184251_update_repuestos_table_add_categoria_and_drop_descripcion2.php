<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('repuestos', function (Blueprint $table) {
              // eliminar la columna
            $table->dropColumn('descripcion');
            $table->string('categoria')->after('nombre');
        });
    }

    public function down(): void
    {
        Schema::table('repuestos', function (Blueprint $table) {
            $table->text('descripcion')->nullable();
            $table->dropColumn('categoria');
        });
    }
};
