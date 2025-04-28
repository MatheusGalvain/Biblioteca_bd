@extends('layouts.app')

@section('title', 'Livros Cadastrados')

@section('content')
<main class="container mt-5">
    <h2 class="text-center" style="font-size: 36px; font-weight: 700; color: #333;">Explore Nosso Acervo</h2>
    <p class="text-center" style="font-size: 18px; color: #777;">Veja todos os livros disponíveis para leitura:</p>

    <div class="row mt-5">
        @foreach($livros as $livro)
            <div class="col-md-4 mb-4">
                <!-- Condição para definir a cor da borda -->
                <div class="card shadow-lg p-2 align-items-center" style="border: none; border-radius: 15px;">
                    <img src="{{ asset('img/book.png') }}" class="card-img-top" style="width: 150px; height: 200px;" alt="Imagem do Livro">

                    <div class="card-body">
                        <h1 class="card-title text-center" style="font-size: 27px; color: #333;">{{ $livro->titulo }}</h1>
                        <p class="card-text text-center" style="color: #666;">
                            <strong>Autor:</strong> {{ $livro->autor }}<br>
                            <strong>Editora:</strong> {{ $livro->editor->nome }}<br>
                            <strong>Gênero:</strong> {{ $livro->genero->nome }}<br>
                            <span class="badge" style="background-color: {{ $livro->disponivel == 'Sim' ? '#28a745' : '#d84734' }}; color: white;">
                                {{ $livro->disponivel == 'Não' ? 'Indisponível' : 'Disponível' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
