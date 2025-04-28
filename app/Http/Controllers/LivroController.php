<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;
use App\Models\Editor;
use App\Models\Genero;

class LivroController extends Controller
{
    public function index() {
        $livros = Livro::orderBy('created_at', 'desc')->with('editor', 'genero')->get();
        $editors = Editor::all();
        $generos = Genero::all();
    
        // Mostrar pro Professor: Função de livros Disponiveis
        foreach ($livros as $livro) {
            $resultado = \DB::select('SELECT fn_verifica_disponibilidade_livro(?) as disponivel', [$livro->id]);
            $livro->disponivel = $resultado[0]->disponivel ?? 'Não';
        }
    
        return view('livros.index', [
            'livros' => $livros,
            'editors' => $editors,
            'generos' => $generos
        ]);
    }
    
    public function livrosCadastrados() {
        $livros = Livro::orderBy('created_at', 'desc')->with('editor', 'genero')->get();
    
        return view('livros.livros_cadastrados', [
            'livros' => $livros
        ]);
    }

    public function create() {
        $livros = Livro::all();
        $editors = Editor::all();
        $generos = Genero::all();

        return view('livros.create', 
        [
            'livros'=>$livros,
            'editors'=>$editors,
            'generos'=>$generos
        ]
    );
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'autor' => 'required',
            'editor_id' => 'required',
            'edicao' => 'required',
            'paginas' => 'required',
            'ano_publicado' => 'required',
            'genero_id' => 'required',
            'codigo' => 'required',
            'estoque' => 'required',
            'disponivel' => 'required',
            'observacao' => 'required'
        ]);
        Livro::create($request->all());

        session()->flash('success', 'Livro cadastrado com sucesso!');

        return redirect()->route('livros-index');
    }

    public function edit($id) {
        $livros = Livro::findOrFail($id);
        $editors = Editor::all();
        $generos = Genero::all();
        return view('livros.edit', 
        [
            'livros'=>$livros,
            'editors'=>$editors,
            'generos'=>$generos
        ]
    );
    }

    public function update(Request $request, $id) {
        $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'autor' => 'required',
            'editor_id' => 'required',
            'edicao' => 'required',
            'paginas' => 'required',
            'ano_publicado' => 'required',
            'genero_id' => 'required',
            'codigo' => 'required',
            'estoque' => 'required',
            'disponivel' => 'required',
            'observacao' => 'required'
        ]);
        $livros = Livro::findOrFail($id);
        $livros->update($request->all());

        return redirect()->route('livros-index');
    }

    public function destroy($id) {
        $livros = Livro::findOrFail($id);
        $livros->delete();

        return redirect()->route('livros-index');
    }
}
