@extends('layouts.app')

@section('title', 'Listagem de Livros')

@section('content')
<div class="container py-5">

    {{-- Sucesso da operação --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cabeçalho --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Listagem de Livros</h2>
            <p class="text-muted" style="font-size: 16px;">Gerencie os livros cadastrados na plataforma.</p>
        </div>
        <div>
            <a class="btn btn-danger btn-sm" href="{{ route('livros-create') }}" style="font-size: 16px; padding: 10px 20px;">
                Novo Livro
            </a>
        </div>
    </div>

    {{-- Tabela de Livros --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            @if(count($livros))
            <div class="table-responsive">
                <table class="m-0 table table-hover table-striped table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editor</th>
                            <th>Gênero</th>
                            <th>Disponível</th>
                            <th>Observação</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($livros as $livro)
                        <tr>
                            <td>{{ $livro->id }}</td>
                            <td>{{ $livro->titulo }}</td>
                            <td>{{ $livro->autor }}</td>
                            <td>{{ $livro->editor->nome }}</td>
                            <td>{{ $livro->genero->nome }}</td>
                            <td>{{ $livro->disponivel }}</td>
                            <td>{{ $livro->observacao }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-warning btn-sm" href="{{ route('livros-edit', ['id'=>$livro->id]) }}">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('livros-destroy', ['id'=>$livro->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este livro?')">
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
                Não existem livros cadastrados.
            </div>
            @endif

        </div>
    </div>

</div>
@endsection
