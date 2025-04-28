@extends('layouts.app')

@section('title', 'Listagem de Editores')

@section('content')
<div class="container py-5">

    {{-- Exibição de mensagem de sucesso --}}
    @if(session('success'))
        <div id="createAlert" class="alert alert-success my-2">
            {{ session('success') }}
        </div>
        <script>
            const createAlert = document.getElementById('createAlert');
            setTimeout(function() {
                createAlert.remove();
            }, 2000);
        </script>
    @endif

    {{-- Cabeçalho da página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Listagem de Editores</h2>
            <p class="text-muted" style="font-size: 16px;">Gerencie os editores da plataforma.</p>
        </div>
        <div>
            <a class="btn btn-danger btn-sm" href="{{ route('editores-create') }}" style="font-size: 16px; padding: 10px 20px;">
                Novo Editor
            </a>
        </div>
    </div>

    {{-- Tabela de Editores --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            @if(count($editors))
            <div class="table-responsive">
                <table class="m-0 table table-hover table-striped table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($editors as $editor)
                        <tr>
                            <td>{{ $editor->id }}</td>
                            <td>{{ $editor->nome }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-warning btn-sm" href="{{ route('editores-edit', ['id'=>$editor->id]) }}">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form id="deleteFormEditor-{{ $editor->id }}" action="{{ route('editores-destroy', ['id'=>$editor->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este editor?')">
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
                Não existem editores cadastrados.
            </div>
            @endif

        </div>
    </div>

</div>

{{-- Exibição de mensagem de erro --}}
@if(session('danger'))
    <div id="deleteEditor" class="alert alert-danger my-2">
        {{ session('danger') }} 
    </div>
    <script>
        const deleteEditor = document.getElementById('deleteEditor');
        setTimeout(function() {
            deleteEditor.remove();
        }, 2000);
    </script>
@endif
@endsection
