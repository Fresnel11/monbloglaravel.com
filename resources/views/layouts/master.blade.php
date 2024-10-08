<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Ajout de boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-----------------------------------------------------------
-- animate.min.css by Daniel Eden (https://animate.style)
-- is required for the animation of notifications and slide out panels
-- you can ignore this step if you already have this file in your project
--------------------------------------------------------------------------->

    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <title>
        @yield('title', 'Mon Blog Laravel')
    </title>
    <link rel="icon"
        href="https://cdn-icons-png.freepik.com/256/5726/5726690.png?ga=GA1.1.386584594.1721053128&semt=ais_hybrid"
        type="image/png">
    <style>
        body {
            background-image: url("https://img.freepik.com/free-vector/cyber-technology-background_23-2148390330.jpg?t=st=1725346402~exp=1725350002~hmac=10a04412f5571aac0568846dc853415d9b0ecc901f518ff40500bf606fd7c59f&w=1380");
            background-size: cover;
            background-repeat: no-repeat;

        }


        .button {
            margin: 0;
            height: auto;
            background: transparent;
            padding: 0;
            border: none;
            cursor: pointer;
        }

        /* button styling */
        .button {
            --border-right: 6px;
            --text-stroke-color: rgba(255, 255, 255, 0.6);
            --animation-color: #018673;
            --fs-size: 2em;
            letter-spacing: 3px;
            text-decoration: none;
            font-size: var(--fs-size);
            font-family: "Arial";
            position: relative;
            text-transform: uppercase;
            color: transparent;
            -webkit-text-stroke: 1px var(--text-stroke-color);
        }

        /* this is the text, when you hover on button */
        .hover-text {
            position: absolute;
            box-sizing: border-box;
            content: attr(data-text);
            color: var(--animation-color);
            width: 0%;
            inset: 0;
            border-right: var(--border-right) solid var(--animation-color);
            overflow: hidden;
            transition: 0.5s;
            -webkit-text-stroke: 1px var(--animation-color);
        }

        /* hover */
        .button:hover .hover-text {
            width: 100%;
            filter: drop-shadow(0 0 23px var(--animation-color))
        }

        .actual-text {
            color: black;
        }

        a {
            text-decoration: none;
        }

        /* a:hover {
            text-decoration: underline;
            
        } */
    </style>



</head>



<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container px-4 px-lg-5">
                
                <button class="button navbar-brand " data-text="Awesome">
                    <span class="actual-text">&nbsp;CODE QUIZZ&nbsp;</span>
                    <span aria-hidden="true" class="hover-text">&nbsp;CODE QUIZZ&nbsp;</span>
                </button>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-secondary" aria-current="page"
                                href="/">Acceuil</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-secondary"
                                href="{{ route('quizzes.index') }}">QUIZZES</a></li>
                        @guest
                            <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('register') }}">Créer un
                                    compte</a></li>

                        @endguest

                    </ul>
                    @guest
                        <form class="d-flex">
                            <button class="btn btn-outline-dark" type="submit">
                                <a href="{{ route('login') }}" class="nav-link">Se connecter</a>
                            </button>
                        </form>
                    @endguest
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Votre profil</a></li>
                                    <li><a class="dropdown-item outline-danger" href="{{ route('logout') }}">Se
                                            déconnecter</a></li>
                                    @if (Auth::check() && Auth::user()->is_admin)
                                        <li><a class="dropdown-item" href="{{ route('admin.dashbord') }}">Dashboard
                                                Admin</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>


                        </ul>
                        </li>
                    @endauth
                </div>
            </div>
        </nav>
        <x-header title="Code Quizz" separator progress-indicator>
            <x-slot:middle class="!justify-end">
                <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
            </x-slot:middle>
            <x-slot:actions>
                <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
            </x-slot:actions>
        </x-header>

        {{-- <nav class="navbar navbar-expand-lg  bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><span
                        class="bg-primary bg-gradient p-1 rounded-3 text-light">QUIZZE</span>CODE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact-us">Contactez-nous</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="/about">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('quizzes.index') }}">QUIZZES</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
                            </li>
                            <li class="nav-item">
                                <a class=" btn btn-outline-primary" href="{{ route('login') }}">Se connecter</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item dropdown text-end">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="nav-link" href="{{ route('profile') }}">Votre profil</a>
                                    <li>

                                        <form action="{{ route('logout') }}" method="GET">
                                            <input class="btn btn-sm btn-dander ml-3" type="submit" value="Se déconnecter">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                    @auth
                        <a href="{{ route('quizzes.create') }}" type="button" class="btn btn-primary">+ Creer un quizz</a>
                    @endauth

                </div>
            </div>
        </nav> --}}


    </header>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <main class="container mt-4">
        <!--Contenu de toutes les pages ici -->
        @yield('contenu')
        <!--Contenu de toutes les pages ici -->
    </main>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"> 
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
