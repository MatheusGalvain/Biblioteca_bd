<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'autor',
        'editor_id',
        'edicao',
        'paginas',
        'ano_publicado',
        'genero_id',
        'codigo',
        'estoque',
        'disponivel',
        'observacao'
    ];

    public function editor() {
        return $this->belongsTo(Editor::class);
    }

    public function genero() {
        return $this->belongsTo(Genero::class);
    }
}
