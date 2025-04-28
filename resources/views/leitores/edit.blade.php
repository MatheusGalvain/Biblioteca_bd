@extends('layouts.app')

@section('title', 'Atualizar Leitores')

@section('content')
<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Atualizar Leitores</h2>
            <p class="text-muted" style="font-size: 16px;">Atualize as informações do leitor.</p>
        </div>
        <div>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('leitores-index') }}" style="font-size: 16px; padding: 10px 20px;">
                Lista de Leitores
            </a>
        </div>
    </div>

    {{-- Formulário de Atualização --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <form action="{{ route('leitores-update', ['id'=>$leitors->id]) }}" method="POST">
                @csrf
                @method('put')

                {{-- Primeira Seção de Campos --}}
                <div class="form-box mb-4">
                    <div class="form-group my-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control form-control-lg" value="{{ $leitors->nome }}" name="nome" id="nome" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="matricula" class="form-label">Matrícula:</label>
                        <input type="text" class="form-control form-control-lg" value="{{ $leitors->matricula }}" name="matricula" id="matricula" required>
                    </div>
                </div>

                {{-- Segunda Seção de Campos --}}
                <div class="form-box mb-4">
                    <div class="form-group my-3">
                        <label for="rg" class="form-label">RG:</label>
                        <input type="text" class="form-control form-control-lg" value="{{ $leitors->rg }}" name="rg" id="rg" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control form-control-lg" value="{{ $leitors->data_nascimento }}" name="data_nascimento" id="data_nascimento" required>
                    </div>
                </div>

                {{-- Terceira Seção de Campos --}}
                <div class="form-box mb-4">
                    <div class="form-group my-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" class="form-control form-control-lg" value="{{ $leitors->telefone }}" name="telefone" id="telefone" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control form-control-lg" value="{{ $leitors->email }}" name="email" id="email" required>
                    </div>
                </div>

                {{-- Botão de Atualizar --}}
                <div class="form-box">
                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-warning btn-lg w-100" value="Atualizar Leitor">
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
