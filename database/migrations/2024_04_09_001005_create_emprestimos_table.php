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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livro_id');
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('leitor_id');
            $table->foreign('leitor_id')->references('id')->on('leitors')->onDelete('cascade')->onUpdate('cascade');
            $table->date('data_emprestimo');
            $table->date('data_devolucao');
            $table->integer('quantidade_emprestada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
