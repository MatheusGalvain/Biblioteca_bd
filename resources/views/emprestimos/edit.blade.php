@extends('layouts.app')

@section('title', 'Atualização de Empréstimos')

@section('content')
<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Atualização de Empréstimos</h2>
            <p class="text-muted" style="font-size: 16px;">Edite as informações do empréstimo abaixo.</p>
        </div>
        <div>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('emprestimos-index') }}" style="font-size: 16px; padding: 10px 20px;">
                Voltar
            </a>
        </div>
    </div>

    {{-- Formulário de Atualização --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('emprestimos-update', ['id'=>$emprestimos->id]) }}" method="POST">
                @csrf
                @method('put')

                {{-- Campo de Título do Livro --}}
                <div class="form-group my-3">
                    <label for="livro_id" class="form-label">Título do Livro:</label>
                    <select class="form-select livro-select" name="livro_id" id="livro_id">
                        <option value="">Selecione um livro</option>
                        @foreach($livros as $livro)                                
                            <option value="{{ $livro->id }}" {{ isset($emprestimos) && $emprestimos->livro_id == $livro->id ? 'selected' : '' }}>
                                Título: ({{ $livro->titulo }}) - Autor: ({{ $livro->autor }}) - Estoque: ({{ $livro->estoque }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Campo de Leitor --}}
                <div class="form-group my-3">
                    <label for="leitor_id" class="form-label">Leitor:</label>
                    <select class="form-select leitor-select" name="leitor_id" id="leitor_id">
                        <option value="">Selecione um leitor</option>
                        @foreach($leitors as $leitor)
                            <option value="{{ $leitor->id }}" {{ isset($emprestimos) && $emprestimos->leitor_id == $leitor->id ? 'selected' : '' }}>
                                Leitor: ({{ $leitor->nome }}) - RG: ({{ $leitor->rg }}) - Matrícula: ({{ $leitor->matricula }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Campo de Data do Empréstimo --}}
                <div class="form-group my-3">
                    <label for="data_emprestimo" class="form-label">Data do Empréstimo:</label>
                    <input type="date" class="form-control" value="{{ $emprestimos->data_emprestimo }}" name="data_emprestimo" id="data_emprestimo">
                </div>

                {{-- Campo de Data de Devolução --}}
                <div class="form-group my-3">
                    <label for="data_devolucao" class="form-label">Data da Devolução:</label>
                    <input type="date" class="form-control" value="{{ $emprestimos->data_devolucao }}" name="data_devolucao" id="data_devolucao">
                </div>


                {{-- Botão de Atualização --}}
                <div class="form-group my-3">
                    <input type="submit" class="btn btn-warning btn-lg w-100" value="Atualizar">
                </div>

            </form>

        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('.leitor-select').select2({
            placeholder: "Selecione ou pesquise um leitor",
            allowClear: true,
            width: '100%'
        });

        $('.livro-select').select2({
            placeholder: "Selecione ou pesquise um livro",
            allowClear: true,
            width: '100%'
        });
    });
</script>

@endsection
