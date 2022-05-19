<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medico_id');
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreignId('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->text('motivo');
            $table->date('fecha_cita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
