@extends('layouts.app')

@section('title', 'Listagem de Gêneros')

@section('content')

<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Gêneros Cadastrados</h2>
            <p class="text-muted" style="font-size: 16px;">Gerencie os gêneros cadastrados na plataforma.</p>
        </div>
        <div>
            <a href="{{ route('generos-create') }}" class="btn btn-danger shadow-sm" style="padding: 8px 20px; font-size: 16px;">
                Novo Gênero
            </a>
        </div>
    </div>

    {{-- Tabela de Gêneros --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            @if(session('success'))
                <div id="createAlert" class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        const alert = document.getElementById('createAlert');
                        if(alert) alert.remove();
                    }, 2000);
                </script>
            @endif

            @if(count($generos))
            <div class="table-responsive">
                <table class="m-0 table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($generos as $genero)
                        <tr>
                            <td>{{ $genero->id }}</td>
                            <td>{{ $genero->nome }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('generos-edit', ['id'=>$genero->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>

                                    <form id="deleteFormGenero-{{ $genero->id }}" action="{{ route('generos-destroy', ['id'=>$genero->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este gênero?')">
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
                Nenhum gênero encontrado.
            </div>
            @endif

            @if(session('danger'))
                <div id="deleteGenero" class="alert alert-danger text-center mt-3">
                    {{ session('danger') }}
                </div>
                <script>
                    setTimeout(function() {
                        const alert = document.getElementById('deleteGenero');
                        if(alert) alert.remove();
                    }, 2000);
                </script>
            @endif

        </div>
    </div>

</div>

@endsection
