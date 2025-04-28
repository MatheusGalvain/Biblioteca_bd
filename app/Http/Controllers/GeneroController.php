<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genero;

class GeneroController extends Controller
{
    public function index() {
        $generos = Genero::orderBy('id', 'desc')->get();
        return view('generos.index', 
        [
            'generos'=>$generos   
        ]
    );
    }

    public function create() {
        $generos = Genero::all();
        return view('generos.create', 
        [
            'generos'=>$generos
        ]
    );
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required'
        ]);
        Genero::create($request->all());

        session()->flash('success', 'Gênero cadastrado com sucesso');

        return redirect()->route('generos-index');
    }

    public function edit($id) {
        $generos = Genero::where('id', $id)->first();
        return view('generos.edit', 
        [
            'generos'=>$generos
        ]
    );
    }

    public function update(Request $request, $id) {
        $data = [
            'nome' => $request->nome
        ];
        $generos = Genero::where('id', $id)->update($data);
        return redirect()->route('generos-index');
    }

    public function destroy($id) {
        $generos = Genero::where('id', $id)->delete();

        session()->flash('danger', 'Gênero deletado com sucesso!');

        return redirect()->route('generos-index');
    }
}
