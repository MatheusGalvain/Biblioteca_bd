@extends('layouts.app')

@section('title', 'Atualização de Usuários')

@section('content')
<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Atualização de Usuários</h2>
            <p class="text-muted" style="font-size: 16px;">Atualize os dados do usuário.</p>
        </div>
        <div>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('usuarios-index') }}" style="font-size: 16px; padding: 10px 20px;">
                Lista de Usuários
            </a>
        </div>
    </div>

    {{-- Formulário de Atualização --}}
    <div class="card shadow-sm border-0 m-0">
        <div class="card-body p-0 m-0">

            <form action="{{ route('usuarios-update', ['id'=>$users->id]) }}" method="POST">
                @csrf
                @method('put')

                {{-- Campo Nome --}}
                <div class="form-group my-4">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $users->name }}" name="name" id="name" required>
                </div>

                {{-- Campo Email --}}
                <div class="form-group my-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-lg" value="{{ $users->email }}" name="email" id="email" required>
                </div>

                {{-- Campo Senha --}}
                <div class="form-group my-4">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control form-control-lg" value="{{ $users->password }}" name="password" id="password">
                </div>

                {{-- Botão de Atualizar --}}
                <div class="form-group my-4">
                    <input type="submit" class="btn btn-warning btn-lg w-100" value="Atualizar">
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
