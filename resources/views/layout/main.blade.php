<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        header{
            background-color: #1E3A5F;
        }
        .menu-btn{
            background-color: #3261a0;
            padding: 3px;
            border-radius:5px;
            color: white;
            transition-duration: .2s;
        }
        .menu-btn:hover{
            transition-duration: .2s;
            background-color: #4b92ee;
        }
        footer{
            background-color: #1E3A5F;
        }

    </style>
</head>
<body>
    <header>
        @yield('header-content')
        <nav class="container p-3">
            <ul class="list-unstyled d-flex gap-2 justify-content-center mb-auto" >
                <li><a class="menu-btn text-decoration-none" href="/estoque">Estoque</a></li>
                <li><a class="menu-btn text-decoration-none" href="/">Menu principal</a></li>
                <li><a class="menu-btn text-decoration-none" href="">Realizar venda</a></li>
            </ul>
        </nav>
    </header>
    @yield('content')
    <footer >
        <div class="container text-center p-3">
            <div class="col">
                <a href="" class="btn btn-secondary">Criador</a>
            </div>
        </div>
    </footer>
</body>
</html>