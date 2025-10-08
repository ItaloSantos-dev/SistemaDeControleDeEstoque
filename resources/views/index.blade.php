<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
</head>
<body>
    
<main>
    <div class="container text-center bg-secondary translate-middle position-absolute top-50 start-50 rounded shadow">
        <div class="row">
            <h1>Menu principal</h1>
        </div>
        <div class="row m-2">
            <div class="col">
                <a href="{{route('produtos.index')}}" class="btn btn-primary shadow">Estoque</a>
            </div>
        </div>
        <div class="row m-2">
            <div class="col">
                <a href="{{route('vendas.create')}}" class="btn btn-primary shadow">Realizar venda</a>
            </div>
        </div>
        
        <div class="row m-2">
            <div class="col">
                <a href="{{route('vendas.index')}}" class="btn btn-primary shadow">Vendas</a>
            </div>
        </div>
    </div>
</main>
</body>
</html>
