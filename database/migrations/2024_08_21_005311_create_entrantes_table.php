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
        Schema::create('entrantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('afiliados_id');
            $table->foreign('afiliados_id')->references('id')->on('afiliados');

            $table->unsignedBigInteger('clinicas_id');
            $table->foreign('clinicas_id')->references('id')->on('clinicas');

            $table->unsignedBigInteger('estado_pacientes_id')->nullable();
            $table->foreign('estado_pacientes_id')->references('id')->on('estado_pacientes');

            $table->unsignedBigInteger('estado_solicitud_id');
            $table->foreign('estado_solicitud_id')->references('id')->on('estado_solicitud');

            $table->date('fecha_cirugia');

            $table->unsignedBigInteger('medicos_id');
            $table->foreign('medicos_id')->references('id')->on('medicos');

            $table->string('nro_solicitud');

            $table->longText('observaciones');

            $table->string('file_1')->nullable();
            $table->string('file_2')->nullable();
            $table->string('file_3')->nullable();
            $table->string('file_4')->nullable();


            $table->string('user_stamps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrantes');
    }
};
