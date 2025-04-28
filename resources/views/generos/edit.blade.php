@extends('layouts.app')

@section('title', 'Atualização de Gêneros')

@section('content')
<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Atualização de Gêneros</h2>
            <p class="text-muted" style="font-size: 16px;">Edite as informações do gênero abaixo.</p>
        </div>
        <div>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('generos-index') }}" style="font-size: 16px; padding: 10px 20px;">
                Voltar
            </a>
        </div>
    </div>

    {{-- Formulário de Atualização --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <form action="{{ route('generos-update', ['id' => $generos->id]) }}" method="POST">
                @csrf
                @method('put')

                {{-- Campo de Nome --}}
                <div class="form-group my-3">
                    <label for="nome" class="form-label">Nome do Gênero:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $generos->nome }}" name="nome" id="nome" required>
                </div>

                {{-- Botão de Atualização --}}
                <div class="form-group my-3">
                    <input type="submit" class="btn btn-warning btn-lg w-100" value="Atualizar">
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
