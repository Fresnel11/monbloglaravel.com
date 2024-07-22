<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Mon Blog Laravel')
    </title>




</head>

<body>
    <header>
        <h1>Mon blog Laravel</h1>
        <nav>
            <ul>
                <li>
                    <a href="/">Acceuil</a>
                </li>
                <li>
                    <a href="/contact-us">Contactez-nous</a>
                </li>
                <li>
                    <a href="/about">A propos</a>
                </li>
                <li>
                    <a href="/articles">Articles</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <!--Contenu de toutes les pages ici -->
        @yield('contenu')
        <!--Contenu de toutes les pages ici -->
    </main>
</body>

</html>
