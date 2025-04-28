@extends('layouts.app')

@section('title', 'Listagem de Leitores')

@section('content')

<div class="container py-5">

    {{-- Alerta de sucesso --}}
    @if(session('success'))
    <div id="createAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        const createAlert = document.getElementById('createAlert');
        setTimeout(function() {
            if (createAlert) {
                createAlert.remove();
            }
        }, 3000);
    </script>
    @endif

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Leitores Cadastrados</h2>
            <p class="text-muted" style="font-size: 16px;">Gerencie os leitores da biblioteca.</p>
        </div>
        <div>
            <a href="{{ route('leitores-create') }}" class="btn btn-danger shadow-sm" style="padding: 8px 20px; font-size: 16px;">
                Novo Leitor
            </a>
        </div>
    </div>

    {{-- Tabela de Leitores --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            @if(count($leitors))
            <div class="table-responsive">
                <table class="m-0 table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>RG</th>
                            <th>Data de Nascimento</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leitors as $leitor)
                        <tr>
                            <td>{{ $leitor->id }}</td>
                            <td>{{ $leitor->nome }}</td>
                            <td>{{ $leitor->matricula }}</td>
                            <td>{{ $leitor->rg }}</td>
                            <td>{{ \Carbon\Carbon::parse($leitor->data_nascimento)->format('d/m/Y') }}</td>
                            <td>{{ $leitor->telefone }}</td>
                            <td>{{ $leitor->email }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('leitores-edit', ['id'=>$leitor->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>

                                    <form action="{{ route('leitores-destroy', ['id'=>$leitor->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este(a) leitor(a)?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3"></i> Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info text-center">
                Nenhum leitor cadastrado.
            </div>
            @endif

        </div>
    </div>

</div>

@endsection
