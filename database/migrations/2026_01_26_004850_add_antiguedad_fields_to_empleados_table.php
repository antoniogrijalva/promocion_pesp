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
        Schema::table('empleados', function (Blueprint $table) {
            $table->decimal('antiguedad_pesp', 4, 1)->nullable();
            $table->decimal('antiguedad_otra', 4, 1)->nullable();
            $table->text('acreditacion_cup_observaciones')->nullable();
            $table->text('acreditacion_competencias_observaciones')->nullable();
            $table->text('acreditacion_desempeno_observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn(['antiguedad_pesp', 'antiguedad_otra']);
            $table->dropColumn('acreditacion_cup_observaciones');
            $table->dropColumn('acreditacion_competencias_observaciones');
            $table->dropColumn('acreditacion_desempeno_observaciones');
        });
    }
};
