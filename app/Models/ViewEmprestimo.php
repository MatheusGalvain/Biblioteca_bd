<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewEmprestimo extends Model
{
    // Mostrar pro Professor: View de emprestimos detalhados que já foram feitos
    protected $table = 'vw_emprestimos_detalhados';
    public $timestamps = false;
}

