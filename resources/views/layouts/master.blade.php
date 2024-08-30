<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Ajout de boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <title>
        @yield('title', 'Mon Blog Laravel')
    </title>
    <style>
        /* From Uiverse.io by satyamchaudharydev */
        /* === removing default button style ===*/
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

        .actual-text{
            color: black;
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
                {{-- <a class="navbar-brand" href="/"> --}}
                    <button class="button navbar-brand " data-text="Awesome">
                        <span class="actual-text">&nbsp;CODE QUIZZ&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;CODE QUIZZ&nbsp;</span>
                    </button>
                {{-- </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Acceuil</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('quizzes.index') }}">QUIZZES</a></li>
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Créer un compte</a></li>

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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item"><a class="dropdown-item nav-link" href="{{ route('profile') }}"> Votre
                                        profil</a></li>
                                <li>Dashboard</li>
                                <li>
                                    <form action="{{ route('logout') }}" method="GET">
                                        <input class="btn btn-sm btn-dander ml-3" type="submit" value="Se déconnecter">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </div>
            </div>
        </nav>


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
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
