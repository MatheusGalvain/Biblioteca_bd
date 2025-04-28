@extends('layouts.app')

@section('title', 'Cadastro de Livros')

@section('content')
<div class="container py-5">

    {{-- Cabeçalho --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Cadastro de Livros</h2>
            <p class="text-muted" style="font-size: 16px;">Preencha os dados do livro para cadastrá-lo.</p>
        </div>
        <div>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('livros-index') }}" style="font-size: 16px; padding: 10px 20px;">
                Voltar
            </a>
        </div>
    </div>

    {{-- Formulário de Cadastro --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <form action="{{ route('livros-store') }}" method="POST">
                @csrf

                {{-- Informações Básicas do Livro --}}
                <div class="row">
                    <div class="col-md-4 form-group my-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" required>
                    </div>

                    <div class="col-md-4 form-group my-3">
                        <label for="subtitulo" class="form-label">Subtítulo</label>
                        <input type="text" class="form-control" name="subtitulo" id="subtitulo">
                    </div>

                    <div class="col-md-4 form-group my-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" name="autor" id="autor">
                    </div>
                </div>

                {{-- Editor, Edição, Páginas --}}
                <div class="row">
                    <div class="col-md-4 form-group my-3">
                        <label for="editor_id" class="form-label">Editor</label>
                        <select class="form-select" name="editor_id" id="editor_id" required>
                            @foreach($editors as $editor)
                                <option value="{{ $editor->id }}">{{ $editor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group my-3">
                        <label for="edicao" class="form-label">Edição</label>
                        <input type="number" class="form-control" name="edicao" id="edicao">
                    </div>

                    <div class="col-md-4 form-group my-3">
                        <label for="paginas" class="form-label">Páginas</label>
                        <input type="number" class="form-control" name="paginas" id="paginas">
                    </div>
                </div>

                {{-- Ano de Publicação, Gênero, Código --}}
                <div class="row">
                    <div class="col-md-4 form-group my-3">
                        <label for="ano_publicado" class="form-label">Ano de Publicação</label>
                        <input type="date" class="form-control" name="ano_publicado" id="ano_publicado" required>
                    </div>

                    <div class="col-md-4 form-group my-3">
                        <label for="genero_id" class="form-label">Gênero</label>
                        <select class="form-select" name="genero_id" id="genero_id" required>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group my-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="number" class="form-control" name="codigo" id="codigo">
                    </div>
                </div>

                {{-- Estoque, Disponível, Observação --}}
                <div class="row">
                    <div class="col-md-4 form-group my-3">
                        <label for="estoque" class="form-label">Estoque</label>
                        <input type="number" class="form-control" name="estoque" id="estoque" required>
                    </div>

                    <div class="col-md-4 form-group my-3">
                        <label for="disponivel" class="form-label">Disponível</label>
                        <select class="form-select" name="disponivel" id="disponivel" required>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                    </div>
                    

                    <div class="col-md-4 form-group my-3">
                        <label for="observacao" class="form-label">Observação</label>
                        <input type="text" class="form-control" name="observacao" id="observacao">
                    </div>
                </div>

                {{-- Botão de Cadastro --}}
                <div class="form-group my-4">
                    <input type="submit" class="btn btn-info btn-lg w-100" value="Cadastrar Livro">
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
