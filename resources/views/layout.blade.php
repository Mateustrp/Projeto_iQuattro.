<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body>
    <header>
        <h1>Projeto iQuattro</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/produtos">Produtos</a></li>
            <li><a href="/clientes">Clientes</a></li>
        </ul>
    </nav>

    <div class="container">
        
        @yield('content')
    </div>

</body>
</html>
