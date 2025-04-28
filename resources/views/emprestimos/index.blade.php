@extends('layouts.app')

@section('title', 'Listagem de Empréstimos')

@section('content')
<div class="container py-5">

    {{-- Alertas --}}
    @if(session('success'))
        <div id="createAlert" class="alert alert-success my-3">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('createAlert')?.remove(), 2000);
        </script>
    @endif

    @if(session('danger'))
        <div id="deleteAlert" class="alert alert-danger my-3">
            {{ session('danger') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('deleteAlert')?.remove(), 2000);
        </script>
    @endif

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Listagem de Empréstimos</h2>
            <p class="text-muted" style="font-size: 16px;">Confira os empréstimos cadastrados.</p>
        </div>
        <div>
            <a class="btn btn-info btn-sm" href="{{ route('emprestimos-create') }}" style="font-size: 16px; padding: 10px 20px;">
                Novo Empréstimo
            </a>
        </div>
    </div>

    {{-- Tabela de Empréstimos --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            @if(count($emprestimos))
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered align-middle m-0">
                    <thead class="table-light" style="font-size: 14px;">
                        <tr>
                            <th>Título do Livro</th>
                            <th>Quantidade Emprestada</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        @foreach($emprestimos as $emprestimo)
                            <tr>
                                <td>{{ $emprestimo->titulo }}</td>
                                <td>{{ $emprestimo->quantidade_emprestada }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <!-- Botão modal -->
                                        <button type="button" class="btn btn-success btn-sm" title="Ver informações" data-bs-toggle="modal" data-bs-target="#modalEmprestimo{{ $emprestimo->emprestimo_id }}">
                                            <i class="bi bi-info-circle"></i>
                                        </button>

                                        <form action="{{ route('emprestimos-destroy', ['id' => $emprestimo->emprestimo_id]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este empréstimo?')">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                            <!-- Modal único por empréstimo -->
                            <div class="modal fade" id="modalEmprestimo{{ $emprestimo->emprestimo_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalhes do Empréstimo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex p-2"><strong>Livro:</strong>&nbsp;{{ $emprestimo->titulo }}</div>
                                            <div class="d-flex p-2"><strong>Quantidade:</strong>&nbsp;{{ $emprestimo->quantidade_emprestada }}</div>
                                            <div class="d-flex p-2"><strong>Leitor:</strong>&nbsp;{{ $emprestimo->leitor_nome }}</div>
                                            <div class="d-flex p-2"><strong>Data do Empréstimo:</strong>&nbsp;{{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/y') }}</div>
                                            <div class="d-flex p-2"><strong>Data da Devolução:</strong>&nbsp;{{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info text-center">
                Não existem empréstimos cadastrados.
            </div>
            @endif

        </div>
    </div>

</div>
@endsection
