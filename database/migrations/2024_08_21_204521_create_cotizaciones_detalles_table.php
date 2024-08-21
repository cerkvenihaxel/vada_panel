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
        Schema::create('cotizaciones_detalles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cotizaciones_id');
            $table->foreign('cotizaciones_id')->references('id')->on('cotizaciones')->onDelete('cascade');

            $table->unsignedBigInteger('articles_id');
            $table->foreign('articles_id')->references('id')->on('articles');

            $table->string('garantia')->nullable();
            $table->float('precio_unitario')->nullable();
            $table->integer('cantidad')->nullable();
            $table->float('subtotal')->nullable();
            $table->string('procedencia')->nullable();
            $table->string('marca')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones_detalles');
    }
};
