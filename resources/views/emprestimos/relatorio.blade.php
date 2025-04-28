@extends('layouts.app')

@section('title', 'Relatório de Empréstimos')

@section('content')
<div class="container mt-4">
    <h4>Relatório de Empréstimos</h4>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Livro</th>
                <th>Leitor</th>
                <th>Quantidade</th>
                <th>Data Empréstimo</th>
                <th>Data Devolução</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $d)
            {{-- {{dd($d)}} --}}
                <tr>
                    <td>{{ $d->titulo }}</td>
                    <td>{{ $d->leitor_nome }}</td>
                    <td>{{ $d->quantidade_emprestada }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->data_emprestimo)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->data_devolucao)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            <p>Total de empréstimos realizados: <strong>{{ $total }}</strong></p>
        </tbody>
    </table>
</div>
@endsection
