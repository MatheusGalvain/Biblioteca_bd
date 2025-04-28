<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Editor;

class EditorController extends Controller
{
    public function index() {
        $editors = Editor::orderBy('id', 'desc')->get();
        return view('editores.index', 
        [
            'editors'=>$editors
        ]
    );
    }

    public function create() {
        $editors = Editor::all();
        return view('editores.create', 
        [
            'editors'=>$editors
        ]
    );
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required'
        ]);
        Editor::create($request->all());

        session()->flash('success', 'Gênero cadastrado com sucesso');

        return redirect()->route('editores-index');
    }

    public function edit($id) {
        $editors = Editor::where('id', $id)->first();
        return view('editores.edit', 
        [
            'editors'=>$editors
        ]
    );
    }

    public function update(Request $request, $id) {
        $data = [
            'nome' => $request->nome
        ];
        $editors = Editor::where('id', $id)->update($data);
        return redirect()->route('editores-index');
    }

    public function destroy($id) {
        $editors = Editor::where('id', $id)->delete();

        session()->flash('danger', 'Deletado com sucesso!');

        return redirect()->route('editores-index');
    }
}
