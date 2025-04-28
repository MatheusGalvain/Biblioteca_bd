@extends('layouts.app')

@section('title', 'Painel Inicial')

@section('content')
<main class="d-flex flex-column flex-wrap">
    
    {{-- Seção Principal Hero --}}
    <section class="container d-flex flex-row gap-5 mt-5 justify-content-center align-items-center">
        <div class="d-flex flex-column gap-3 w-50">
            <h2 style="font-size: 48px; font-weight: 700; color: #333;">Amplie seus conhecimentos!</h2>
            <p style="font-size: 20px; color: #666;">Acesse nosso acervo gratuito, sem burocracias. Escolha, alugue e leia de forma simples e rápida.</p>
            <a href="{{ route('emprestimos-index') }}" class="btn btn-primary shadow" style="width: fit-content; padding: 0.75rem 2rem; font-size: 1rem; background-color: #d84734; border-radius: 0.5rem; border: none;">
                Quero Pegar Emprestado
            </a>
        </div>
        
        <div class="position-relative" style="width: 280px; height: 400px;">
            <img src="{{ asset('img/senhordosaneis.jpg') }}" alt="Senhor dos Anéis" 
                 class="position-absolute top-0 start-0 w-100 h-100 rounded shadow" 
                 style="object-fit: cover; transition: transform 0.3s;"
                 onmouseover="this.style.transform='scale(1.05)'" 
                 onmouseout="this.style.transform='scale(1)'">
            
            <img src="{{ asset('img/starwars.jpeg') }}" alt="Star Wars" 
                 class="position-absolute" 
                 style="top: 30px; left: 160px; width: 100%; height: 100%; object-fit: cover; border-radius: 1rem; box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.25); z-index: 1; transition: transform 0.3s;"
                 onmouseover="this.style.transform='scale(1.05)'" 
                 onmouseout="this.style.transform='scale(1)'">
        </div>
    </section>

    {{-- Seção Carrossel de Livros --}}
    <section class="py-2 mt-5" style="background-color: #f8f9fa;">
        <div class="container d-flex flex-column align-items-center">
            <h2 class="mb-3" style="font-size: 36px; font-weight: 700; color: #333;">Nosso Acervo</h2>
            <p style="font-size: 18px; color: #777;">Veja alguns dos títulos disponíveis para empréstimo:</p>
    
            <div id="carouselLivros" class="carousel slide w-100 mt-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($livros->chunk(3) as $chunk)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="row">
                                @foreach($chunk as $livro)
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
                        </div>
                    @endforeach
                </div>
            </div>
    
            <!-- Botão "Veja Mais" -->
            <a href="{{ route('livros-cadastrados') }}" class="btn btn-primary shadow mt-4" style="width: fit-content; padding: 0.75rem 2rem; font-size: 1rem; background-color: #d84734; border-radius: 0.5rem; border: none;">
                Veja Mais
            </a>
        </div>
    </section>
    

    {{-- Nova Sessão 1 - Benefícios --}}
    <section class="py-5" style="background-color: white;">
        <div class="container text-center">
            <h2 class="mb-4" style="font-size: 36px; font-weight: 700; color: #333;">Por que escolher nossa biblioteca?</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="p-4 shadow rounded" style="background-color: #f0f0f0;">
                        <h4 style="color: #d84734;">Sem Mensalidade</h4>
                        <p class="text-muted mt-2">Totalmente grátis para todos os leitores cadastrados.</p>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="p-4 shadow rounded" style="background-color: #f0f0f0;">
                        <h4 style="color: #d84734;">Acesso Rápido</h4>
                        <p class="text-muted mt-2">Solicite o empréstimo em poucos cliques e retire facilmente.</p>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="p-4 shadow rounded" style="background-color: #f0f0f0;">
                        <h4 style="color: #d84734;">Variedade</h4>
                        <p class="text-muted mt-2">De clássicos a lançamentos modernos, escolha seu próximo livro favorito.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Nova Sessão 2 - Chamada para Ação --}}
    <section class="py-5" style="background-color: #d84734;">
        <div class="container text-center text-white">
            <h2 style="font-size: 36px; font-weight: 700;">Ainda não se cadastrou?</h2>
            <p class="mt-3" style="font-size: 20px;">Aproveite agora mesmo todo nosso acervo. É gratuito e rápido!</p>
            {{-- <a href="{{ route('register') }}" class="btn btn-light mt-4" style="padding: 0.75rem 2rem; font-size: 1rem; border-radius: 0.5rem;">
                Criar Minha Conta
            </a> --}}
        </div>
    </section>

</main>
@endsection
