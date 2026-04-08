<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('iten_intervencion_aires', function (Blueprint $table) {
            $table->string('categoria')->after('nombre');
        });
    }

    public function down(): void
    {
        Schema::table('iten_intervencion_aires', function (Blueprint $table) {;
            $table->dropColumn('categoria');
        });
    }
};
