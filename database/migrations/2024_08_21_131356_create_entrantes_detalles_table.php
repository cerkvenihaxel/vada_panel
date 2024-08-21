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
        Schema::create('entrantes_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrantes_id');
            $table->foreign('entrantes_id')->references('id')->on('entrantes');

            $table->unsignedBigInteger('articles_id');
            $table->foreign('articles_id')->references('id')->on('articles');

            $table->integer('cantidad');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrantes_detalles');
    }
};
