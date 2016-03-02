<html lang="es">
<head>
    <title>Opinion de ibi</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/spacelab/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/script.js"></script>

    </head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Inicio</a>
            <a class="navbar-brand" href="{{route('proposal_new_path')}}">Crea tu propuesta</a>
        </div>
        <div class="nav navbar-nav navbar-right">

            @if($currentUser)
                <p class="navbar-brand">Hola <a href="{{route('user_show_path')}}" > {{$currentUser->name}}</a>
                <p class="navbar-brand"><a href="{{ route('auth_destroy_path') }}">Salir</a></p>
            @else
            <a class="navbar-brand" href="{{ route('auth_show_path') }}">Inicia sesión</a>
            <a class="navbar-brand" href="{{route('user_new_path')}}">Regístrate</a>@endif<!--auth_new_path -->
        </div>

    </div>
</nav>
<div class="container homeContainer">
    <h1>la opinion de ibi</h1>
    @yield('content')
</div>
</body>
</html>