<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Painel inicial - Sistema para gestão de biblioteca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery (obrigatório pro Select2 funcionar) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- CSS para o footer colar no final da tela -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>
    <header class="shadow-sm" style="background-color: #ffffff;">
        <div class="container d-flex flex-wrap align-items-center justify-content-between py-3">
            
            {{-- Logo --}}
            <a href="{{ route('dashboards-index') }}" class="text-decoration-none">
                <h1 style="font-size: 28px; font-weight: bold; color: #d84734; margin: 0;">Biblioteca BD</h1>
            </a>

            {{-- Navegação --}}
            <nav class="d-flex gap-4 align-items-center">

                <a href="{{ route('livros-cadastrados') }}" class="text-dark text-decoration-none" style="font-size: 18px;">Livros Disponíveis</a>

                {{-- Dropdown Cadastro --}}
                <div class="dropdown">
                    <a class="text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('usuarios-index') }}">Usuários</a></li>
                        <li><a class="dropdown-item" href="{{ route('leitores-index') }}">Leitores</a></li>
                        <li><a class="dropdown-item" href="{{ route('editores-index') }}">Editores</a></li>
                        <li><a class="dropdown-item" href="{{ route('generos-index') }}">Gêneros</a></li>
                        <li><a class="dropdown-item" href="{{ route('livros-index') }}">Livros</a></li>
                    </ul>
                </div>

                {{-- Itens soltos --}}
                <a href="{{ route('emprestimos-index') }}" class="text-dark text-decoration-none" style="font-size: 18px;">Emprestimos</a>
                <a href="{{ route('emprestimos-relatorio') }}" class="text-dark text-decoration-none" style="font-size: 18px;">Relatórios</a>

            </nav>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class=" my-3">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="d-flex justify-content-end py-2 mb-0" style="background-color: #dadada;">
        <h6 class="mb-0" style="margin-right: 20px;">© Direitos reservados: Matheus Galvain | Programação de Banco de Dados | URI Erechim</h6>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
