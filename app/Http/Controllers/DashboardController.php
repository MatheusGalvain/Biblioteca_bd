<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class DashboardController extends Controller
{
    public function index() {
        $livros = Livro::all();

        return view('dashboards.index', compact('livros'));
    }
}
