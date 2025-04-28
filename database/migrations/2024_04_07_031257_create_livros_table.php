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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('autor');
            $table->unsignedBigInteger('editor_id');
            $table->foreign('editor_id')->references('id')->on('editors')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('edicao');
            $table->integer('paginas');
            $table->date('ano_publicado');
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('codigo');
            $table->integer('estoque');
            $table->string('disponivel');
            $table->string('observacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
