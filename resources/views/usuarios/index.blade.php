@extends('layouts.app')

@section('title', 'Listagem de Usuários')

@section('content')

<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Usuários Cadastrados</h2>
            <p class="text-muted" style="font-size: 16px;">Gerencie os usuários da plataforma.</p>
        </div>
        <div>
            <a href="{{ route('usuarios-create') }}" class="btn btn-danger shadow-sm" style="padding: 8px 20px; font-size: 16px;">
                Novo Usuário
            </a>
        </div>
    </div>

    {{-- Tabela de Usuários --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            @if(count($users))
            <div class="table-responsive">
                <table class="m-0 table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('usuarios-edit', ['id'=>$user->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>

                                    <form id="deleteFormUser-{{ $user->id }}" action="{{ route('usuarios-destroy', ['id'=>$user->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
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
                Nenhum usuário encontrado.
            </div>
            @endif

        </div>
    </div>

</div>

@endsection
