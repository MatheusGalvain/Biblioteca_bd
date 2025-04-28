@extends('layouts.app')

@section('title', 'Atualização de Livros')

@section('content')
<div class="container py-5">

    {{-- Cabeçalho da Página --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="font-size: 32px;">Atualização de Livros</h2>
            <p class="text-muted" style="font-size: 16px;">Edite as informações do livro abaixo.</p>
        </div>
        <div>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('livros-index') }}" style="font-size: 16px; padding: 10px 20px;">
                Voltar
            </a>
        </div>
    </div>

    {{-- Formulário de Atualização --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <form action="{{ route('livros-update', ['id' => $livros->id]) }}" method="POST">
                @csrf
                @method('put')

                {{-- Campo de Título --}}
                <div class="form-group my-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $livros->titulo }}" name="titulo" id="titulo" required>
                </div>

                {{-- Campo de Subtítulo --}}
                <div class="form-group my-3">
                    <label for="subtitulo" class="form-label">Subtítulo:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $livros->subtitulo }}" name="subtitulo" id="subtitulo" required>
                </div>

                {{-- Campo de Autor --}}
                <div class="form-group my-3">
                    <label for="autor" class="form-label">Autor:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $livros->autor }}" name="autor" id="autor" required>
                </div>

                {{-- Campo de Editor --}}
                <div class="form-group my-3">
                    <label for="editor_id" class="form-label">Editor:</label>
                    <select class="form-select form-select-lg" name="editor_id" id="editor_id" required>
                        <option value="select">-- Selecione um Editor --</option>
                        @foreach($editors as $editor)
                            <option value="{{ $editor->id }}"{{ $livros->editor_id == $editor->id ? ' selected' : '' }}>{{ $editor->nome }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Campo de Edição --}}
                <div class="form-group my-3">
                    <label for="edicao" class="form-label">Edição:</label>
                    <input type="number" class="form-control form-control-lg" value="{{ $livros->edicao }}" name="edicao" id="edicao" required>
                </div>

                {{-- Campo de Páginas --}}
                <div class="form-group my-3">
                    <label for="paginas" class="form-label">Páginas:</label>
                    <input type="number" class="form-control form-control-lg" value="{{ $livros->paginas }}" name="paginas" id="paginas" required>
                </div>

                {{-- Campo de Ano de Publicação --}}
                <div class="form-group my-3">
                    <label for="ano_publicado" class="form-label">Ano de Publicação:</label>
                    <input type="date" class="form-control form-control-lg" value="{{ $livros->ano_publicado }}" name="ano_publicado" id="ano_publicado" required>
                </div>

                {{-- Campo de Gênero --}}
                <div class="form-group my-3">
                    <label for="genero_id" class="form-label">Gênero:</label>
                    <select class="form-select form-select-lg" name="genero_id" id="genero_id" required>
                        <option value="select">-- Selecione um Gênero --</option>
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}"{{ $livros->genero_id == $genero->id ? ' selected' : '' }}>{{ $genero->nome }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Campo de Código --}}
                <div class="form-group my-3">
                    <label for="codigo" class="form-label">Código:</label>
                    <input type="number" class="form-control form-control-lg" value="{{ $livros->codigo }}" name="codigo" id="codigo" required>
                </div>

                {{-- Campo de Estoque --}}
                <div class="form-group my-3">
                    <label for="estoque" class="form-label">Estoque:</label>
                    <input type="number" class="form-control form-control-lg" value="{{ $livros->estoque }}" name="estoque" id="estoque" required>
                </div>

                {{-- Campo de Disponível --}}
                <div class="form-group my-3">
                    <label for="disponivel" class="form-label">Disponível:</label>
                    <select class="form-select form-select-lg" name="disponivel" id="disponivel" required>
                        <option value="Sim"{{ $livros->disponivel == 'Sim' ? ' selected' : '' }}>Sim</option>
                        <option value="Não"{{ $livros->disponivel == 'Não' ? ' selected' : '' }}>Não</option>
                    </select>
                </div>

                {{-- Campo de Observação --}}
                <div class="form-group my-3">
                    <label for="observacao" class="form-label">Observação:</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $livros->observacao }}" name="observacao" id="observacao">
                </div>

                {{-- Botão de Atualização --}}
                <div class="form-group my-3">
                    <input type="submit" class="btn btn-warning btn-lg w-100" value="Atualizar Livro">
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
