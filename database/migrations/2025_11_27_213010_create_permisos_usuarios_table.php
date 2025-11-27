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
        Schema::create('permisos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('admin')->default(false);
            $table->boolean('editar')->default(false);
            $table->boolean('borrar')->default(false);
            $table->boolean('crear')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos_usuarios');
    }
};
