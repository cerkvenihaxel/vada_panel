<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('des_articulo');
            $table->string('codigo_articulo');
            $table->string('marca')->nullable();
            $table->integer('stock')->nullable();
            $table->float('precio_venta')->nullable();
            $table->float('precio_compra')->nullable();

            $table->unsignedBigInteger('patologia_id')->nullable();
            $table->foreign('patologia_id')->references('id')->on('patologias')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
