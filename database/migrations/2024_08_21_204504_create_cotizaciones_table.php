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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('entrantes_id');
            $table->foreign('entrantes_id')->references('id')->on('entrantes');

            $table->string('nro_solicitud')->nullable();

            $table->date('fecha_limite')->nullable();
            $table->text('observaciones')->nullable();

            $table->unsignedBigInteger('estado_solicitud_id');
            $table->foreign('estado_solicitud_id')->references('id')->on('estado_solicitud');

            $table->unsignedBigInteger('estado_pedido_id');
            $table->foreign('estado_pedido_id')->references('id')->on('estado_solicitud');

            $table->string('file_1')->nullable();
            $table->string('file_2')->nullable();
            $table->string('file_3')->nullable();
            $table->string('file_4')->nullable();

            $table->unsignedBigInteger('proveedores_id');
            $table->foreign('proveedores_id')->references('id')->on('proveedores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
