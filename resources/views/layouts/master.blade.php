<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mon blog Laravel</title>




</head>

<body>
    <h1>Mon blog Laravel</h1>

    <p>
        <a href="/contact-us">Contactez-nous</a>
    </p>
    <!--Contenu de toutes les pages ici -->
    @yield('contenu')
    <!--Contenu de toutes les pages ici -->
</body>

</html>
