<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes de emprestimo de livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row my-4">
            @foreach($emprestimos as $emprestimo)
                <div class="modal-body">
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Livro empresatado: </span>
                        <span>{{ $emprestimo->titulo }}</span>
                    </div>    
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">quantidade Empresatada: </span>
                        <span>{{ $emprestimo->quantidade_emprestada }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Leitor: </span>
                        <span>{{ $emprestimo->leitor_nome }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Data do Emprestimo: </span>
                        <span>{{ \Illuminate\Support\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/y') }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Data da Devolução: </span>
                        <span>{{ \Illuminate\Support\Carbon::parse($emprestimo->data_devolucao)->format('d/m/y') }}</span>
                    </div>   
                    <div><h2>-----------</h2></div> 
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>