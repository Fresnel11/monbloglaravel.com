const mix = require('laravel-mix');

// Compiler le JavaScript
mix.js('resources/js/app.js', 'public/js')

// Compiler le CSS avec Tailwind
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ]);

// Vous pouvez ajouter d'autres configurations si nécessaire
