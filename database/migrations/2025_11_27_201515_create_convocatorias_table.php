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
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('fecha');

            $table->integer('empleado_id')->nullable();
            $table->string('puesto_actual')->nullable();
            $table->string('puesto_solicitado')->nullable();
            $table->string('observaciones')->nullable();

            $table->integer('periodo_id');


            //informacion de como estaban los datos de certficacion del elemento policial al realizar el registro 
                $table->string('acreditacion_cuip')->nullable();
                $table->date('acreditacion_cuip_fecha')->nullable();
                $table->date('acreditacion_cuip_vigencia')->nullable();


                $table->boolean('acreditacion_formacion');
                $table->date('acreditacion_formacion_fecha')->nullable();
                
                $table->boolean('acreditacion_competencias');
                $table->date('acreditacion_competencias_fecha')->nullable();
                $table->date('acreditacion_competencias_vigencia')->nullable();
                $table->decimal('acreditacion_competencias_calificacion', 5, 2)->nullable();

                $table->boolean('acreditacion_c3');
                $table->date('acreditacion_c3_fecha')->nullable();
                $table->date('acreditacion_c3_vigencia')->nullable();
                $table->string('acreditacion_c3_observaciones')->nullable();

                $table->boolean('acreditacion_desempeno');
                $table->date('acreditacion_desempeno_fecha')->nullable();
                $table->date('acreditacion_desempeno_vigencia')->nullable();
                $table->decimal('acreditacion_desempeno_calificacion', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocatorias');
    }
};
