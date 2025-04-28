<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Leitor;

class LeitorController extends Controller
{
    public function index() {
        $leitors = Leitor::orderBy('id', 'desc')->get();
        return view('leitores.index',
        [
            'leitors'=>$leitors
        ]
    );
    }

    public function create() {
        $leitors = Leitor::all();
        return view('leitores.create',
        [
            'leitors'=>$leitors
        ]
    );
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required',
            'rg' => 'required',
            'data_nascimento' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ]);

        Leitor::create($request->all());

        session()->flash('success', 'Leitor cadastraco com sucesso!');

        return redirect()->route('leitores-index');
    }

    public function edit($id) {
        $leitors = Leitor::where('id', $id)->first();
        return view('leitores.edit', 
        [
            'leitors'=>$leitors
        ]
    );
    }

    public function update(Request $request, $id) {
        $data = [
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'rg' => $request->rg,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'email' => $request->email
        ];

        $leitors = Leitor::where('id', $id)->update($data);
        return redirect()->route('leitores-index');
    }

    public function destroy($id) {
        $leitors = Leitor::where('id', $id)->delete();
        return redirect()->route('leitores-index');
    }
}
