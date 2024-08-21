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
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->string('identificador_afiliado')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento');
            $table->string('telefono');
            $table->string('sexo')->nullable();
            $table->string('email')->nullable();
            $table->string('provincia')->nullable();
            $table->string('localidad')->nullable();

            $table->unsignedBigInteger('obras_sociales_id')->nullable();
            $table->foreign('obras_sociales_id')->references('id')->on('obras_sociales')->onDelete('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliados');
    }
};
