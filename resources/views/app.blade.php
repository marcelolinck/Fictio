<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fictio</title>
        <!-- Scripts -->
        {{-- @routes --}}
        @viteReactRefresh
        @vite('Modules/Site/Resources/assets/js/app.jsx')
        {{-- @inertiaHead --}}
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
