@extends('layouts.app')

@section('title', 'Cadastro de Empréstimos')

@section('content')
<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Cadastro de Empréstimos</h2>
            <p class="text-muted" style="font-size: 16px;">Preencha o formulário abaixo para cadastrar um novo empréstimo.</p>
        </div>
        <div>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('emprestimos-index') }}" style="font-size: 16px; padding: 10px 20px;">
                Voltar
            </a>
        </div>
    </div>

    {{-- Formulário de Cadastro --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <form action="{{ route('emprestimos-store') }}" method="POST">
                @csrf

                {{-- Campo de Título do Livro --}}
                <div class="form-group my-3">
                    <label for="livro_id" class="form-label">Título do Livro:</label>
                    <select class="form-select form-select-lg select2" name="livro_id" id="livro_id" required>
                        <option value="">-- Selecione um livro --</option>
                        @foreach($livros as $livro)
                            @if($livro->estoque > 0) <!-- Exibe apenas livros com estoque > 0 -->
                                <option value="{{ $livro->id }}" data-estoque="{{ $livro->estoque }}">
                                    Título: ({{ $livro->titulo }}) - Autor: ({{ $livro->autor }}) - Estoque: ({{ $livro->estoque }})
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                {{-- Campo de Leitor --}}
                <div class="form-group my-3">
                    <label for="leitor_id" class="form-label">Leitor:</label>
                    <select class="form-select form-select-lg select2" name="leitor_id" id="leitor_id" required>
                        <option value="">-- Selecione um leitor --</option>
                        @foreach($leitors as $leitor)
                            <option value="{{ $leitor->id }}">
                                Leitor: ({{ $leitor->nome }}) - RG: ({{ $leitor->rg }}) - Matrícula: ({{ $leitor->matricula }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Campo de Data do Empréstimo --}}
                <div class="form-group my-3">
                    <label for="data_emprestimo" class="form-label">Data do Empréstimo:</label>
                    <input type="date" class="form-control form-control-lg" name="data_emprestimo" required>
                </div>

                {{-- Campo de Data da Devolução --}}
                <div class="form-group my-3">
                    <label for="data_devolucao" class="form-label">Data da Devolução:</label>
                    <input type="date" class="form-control form-control-lg" name="data_devolucao" required>
                </div>

                {{-- Campo de Quantidade Emprestada --}}
                <div class="form-group my-3">
                    <label for="quantidade_emprestada" class="form-label">Quantidade Emprestada:</label>
                    <input type="number" class="form-control form-control-lg" name="quantidade_emprestada" id="quantidade_emprestada" required>
                    <small id="estoque-warning" class="text-danger" style="display:none;">A quantidade emprestada não pode ser maior que o estoque disponível.</small>
                </div>

                {{-- Botão de Cadastro --}}
                <div class="form-group my-3">
                    <input type="submit" class="btn btn-info btn-lg w-100" value="Cadastrar" id="submit-btn">
                </div>

            </form>

        </div>
    </div>

</div>

{{-- Script de Inicialização do Select2 e Validação de Quantidade --}}
<script>
    $(document).ready(function() {
        $('#livro_id').select2({
            placeholder: "Selecione ou pesquise um livro",
            allowClear: true,
            width: '100%'
        });

        $('#leitor_id').select2({
            placeholder: "Selecione ou pesquise um leitor",
            allowClear: true,
            width: '100%'
        });

        $('#livro_id').change(function() {
            var estoque = $(this).find(':selected').data('estoque');
            $('#quantidade_emprestada').attr('max', estoque);
            $('#quantidade_emprestada').val('');
            $('#estoque-warning').hide(); 
        });

        $('#quantidade_emprestada').on('input', function() {
            var estoque = $('#livro_id').find(':selected').data('estoque');
            var quantidade = $(this).val();

            if (quantidade < 0) {
                $(this).val(0); // Corrige para 0
                $('#estoque-warning').text('A quantidade emprestada não pode ser menor que 0.').show();
                $('#submit-btn').prop('disabled', true); 
            } else if (quantidade > estoque) {
                $('#estoque-warning').text('A quantidade emprestada não pode ser maior que o estoque disponível.').show();
                $('#submit-btn').prop('disabled', true); 
            } else {
                $('#estoque-warning').hide();
                $('#submit-btn').prop('disabled', false);
            }
        });
    });
</script>

