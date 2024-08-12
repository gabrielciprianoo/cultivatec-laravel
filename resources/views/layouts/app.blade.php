<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cultiva-tec</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body>
    <header
        class="
     @if (Route::is('index') || Route::is('login')) bg-img bg-cover bg-no-repeat bg-center h-[40rem] md:h-[35rem]
            @else
                bg-green-700 @endif
    ">
        <nav class="flex flex-col justify-between container mx-auto items-center gap-4 md:flex-row px-6">
            <a href="{{ route('index') }}"><img class="w-72" src="{{ asset('img/agricultor.png') }}"
                    alt="Logo cultivando tec"><span class="hidden">Logo cultivando tec</span></a>
            @if (auth()->check())
                <a href="{{ route('fruit.index') }}" class="text-white text-2xl hover:text-yellow-400 ">Bienvenido
                    Admin</a>
            @endif
            @if (auth()->check())
                <a href="{{ route('logout') }}" class="text-white text-2xl hover:text-yellow-400">Cerrar Sesión</a>
            @else
                <a href="{{ route('login') }}" class="text-white text-2xl hover:text-yellow-400">Iniciar Sesión</a>
            @endif

            



        </nav>

        @if (Route::is('index') || Route::is('login'))
            <div>
                <h1 class="text-white  text-3xl md:text-5xl text-center mt-12 md:mt-0 ">CULTIVANDO-TEC
                    <h1 />
                    <p class="text-white text-lg md:text-2xl text-center mt-8">"Cultura Para la Agricultura"</p>
            </div>
        @endif

    </header>


    @yield('content')


    <footer class="bg-green-600 py-6">
        <div class="container mx-auto flex flex-col sm:flex-row justify-between items-center">
            <img class="w-72" src="{{ asset('img/agricultor.png') }}" alt="logo cultivando tec">
            <p class="text-white text-xl">Todos los derechos reservados &copy; {{ date('Y') }}</p>
        </div>
    </footer>

</body>

</html>
