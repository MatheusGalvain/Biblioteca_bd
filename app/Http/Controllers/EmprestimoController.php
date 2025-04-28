<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\ViewEmprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Leitor;
use App\Models\Livro;

use Dompdf\Dompdf;
use Dompdf\Options;

class EmprestimoController extends Controller
{
    
    public function index()
    {
        $emprestimos = ViewEmprestimo::select(
                'titulo',
                'leitor_nome',
                DB::raw('SUM(quantidade_emprestada) as quantidade_emprestada')
            )
            ->groupBy('titulo', 'leitor_nome')
            ->get();
    
        return view('emprestimos.index', compact('emprestimos'));
    }

    public function relatorioView()
    {
        // Mostrar pro Professor: Função do total de emprestimos
        $dados = ViewEmprestimo::all();
        $total = \DB::select("SELECT fn_calcula_total_emprestimos() AS total")[0]->total;
    
        return view('emprestimos.relatorio', compact('dados', 'total'));
    }

    public function searchLeitor(Request $request)
    {
        $query = $request->get('query');
        $leitors = Leitor::where('nome', 'like', '%' . $query . '%')
                        ->orWhere('rg', 'like', '%' . $query . '%')
                        ->orWhere('matricula', 'like', '%' . $query . '%')
                        ->get();

        return response()->json(['leitors' => $leitors]);
    }

    public function gerarPDF() {
        $emprestimos = Emprestimo::with('livro')->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('emprestimos.pdf', compact('emprestimos'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->stream('emprestimos.pdf');
    }

    public function create() {
        $livros = Livro::all();
        $leitors = Leitor::all();
        return view('emprestimos.create', compact('livros', 'leitors'));
    }

    public function store(Request $request) {
        $request->validate([
            'livro_id' => 'required',
            'leitor_id' => 'required',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_emprestimo',
            'quantidade_emprestada' => 'required|integer|min:1'
        ]);
        try {
            // Mostrar pro Professor: Chama a PROCEDURE para registrar o empréstimo
            DB::statement("CALL sp_novo_emprestimo(?, ?, ?, ?, ?)", [
                $request->livro_id,
                $request->leitor_id,
                $request->data_emprestimo,
                $request->data_devolucao,
                $request->quantidade_emprestada
            ]);
            
            session()->flash('success', 'Empréstimo cadastrado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('danger', 'Erro: ' . $e->getMessage());
        }

        return redirect()->route('emprestimos-index');
    }

    public function edit($id) {
        $emprestimos = DB::table('emprestimos')->where('id', $id)->first();
        $livros = Livro::all();
        $leitors = Leitor::all();

        return view('emprestimos.edit', compact('emprestimos', 'livros', 'leitors'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'livro_id' => 'required',
            'leitor_id' => 'required',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_emprestimo',
            'quantidade_emprestada' => 'required|integer|min:1'
        ]);

        DB::table('emprestimos')->where('id', $id)->update([
            'livro_id' => $request->livro_id,
            'leitor_id' => $request->leitor_id,
            'data_emprestimo' => $request->data_emprestimo,
            'data_devolucao' => $request->data_devolucao,
            'quantidade_emprestada' => $request->quantidade_emprestada,
            'updated_at' => now()
        ]);

        return redirect()->route('emprestimos-index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function totalEmprestimosPorLeitor($leitor_id)
    {
        $total = \DB::select("SELECT fn_calcula_total_emprestimos(?) AS total", [$leitor_id]);
        return response()->json([
            'leitor_id' => $leitor_id,
            'total_emprestimos' => $total[0]->total
        ]);
    }

    public function destroy($id) {
        $emprestimo = Emprestimo::findOrFail($id);
    
        $livro = Livro::findOrFail($emprestimo->livro_id);

        $livro->estoque += $emprestimo->estoque;
        $livro->save();
    
        $emprestimo->delete();
    
        session()->flash('danger', 'Empréstimo excluído com sucesso! Quantidade do livro restaurada ao estoque.');
    
        return redirect()->route('emprestimos-index');
    }
    
}
