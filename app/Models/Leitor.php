<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'matricula',
        'rg',
        'data_nascimento',
        'telefone',
        'email'
    ];
}
