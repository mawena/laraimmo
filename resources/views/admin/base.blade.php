<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap-cosmo.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title') | Administration</title>
    <style>
        @layer reset {
            button {
                all: unset;
            }
        }
    </style>
</head>

@php
    $routeName = request()
        ->route()
        ->getName();
@endphp

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.property.index') }}">Administration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => str_starts_with($routeName, 'admin.property.'),
                        ]) href="{{ route('admin.property.index') }}">Gérer les biens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => str_starts_with($routeName, 'admin.option.'),
                        ]) href="{{ route('admin.option.index') }}">Gérer les options
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            {{-- {{ \Illuminate\Support\Facades\Auth::user()->name }} --}}
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="nav-link">Se deconnecter</button>
                            </form>
                        @endauth

                        @guest
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                            </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]', {
            plugins: {
                remove_button: {
                    title: 'Supprimer'
                }
            }
        });
    </script>
</body>


</html>
