<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap-cosmo.min.css">
    <title>@yield('title') | LaraIMMO</title>
</head>

@php
    $routeName = request()
        ->route()
        ->getName();
@endphp

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Agence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => str_starts_with($routeName, 'property.'),
                        ]) href="{{ route('property.index') }}">Biens
                        </a>
                    </li>
                </ul>
                {{-- <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="nav-link">Se deconnecter</button>
                        </form>
                    @endauth

                    @guest
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a>
                        </div>
                    @endguest
                </div> --}}
            </div>
        </div>
    </nav>
    @yield('content')
</body>


</html>
