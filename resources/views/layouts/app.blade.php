<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Las Lomas</title>

        <!-- Fonts Estio de letras -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- <style>
            html {
                background: url('{{ asset('img/Principal.png') }}') no-repeat top fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;

                }
        </style> --}}
    </head>

    <body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50" class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen ">
            @livewire('navigation-menu')


            <!-- Pagina Contenedor -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
