<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
            <style type="text/css">
             body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        footer {
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
        }
        @media (min-width: 980px) {
            /* Aplica estilos cuando la resolución es mayor o igual a 1600px */
            footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
            }
        }
        @media (min-width: 820px) and (max-width: 820px) {
            /* Aplica estilos solo para dispositivos con una resolución de 820px de ancho */
            footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
            }
        }
        @media (min-width: 768px) and (max-width: 768px) {
            /* Aplica estilos solo para dispositivos con una resolución de 768px de ancho */
            footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
            }
        }
            </style>
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="content min-h-screen bg-sky-200 w-full">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <!--- Pie de página--->
            <footer class="bg-gray-800 text-white py-2 shadow-md w-full">
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                  <ul class="flex justify-center sm:justify-start">
                    <li class="mr-6">
                      <a href="#" class="hover:text-indigo-500 transition-colors duration-300">Facebook</a>
                    </li>
                    <li class="mr-6">
                      <a href="#" class="hover:text-indigo-500 transition-colors duration-300">Twitter</a>
                    </li>
                    <li class="mr-6">
                      <a href="#" class="hover:text-indigo-500 transition-colors duration-300">Instagram</a>
                    </li>
                    <li>
                      <a href="#" class="hover:text-indigo-500 transition-colors duration-300">LinkedIn</a>
                    </li>
                  </ul>
                  <p class="text-xs text-gray-400 sm:ml-6 mt-4 sm:mt-0">&copy; 2023 Nombre de la Empresa. Todos los derechos reservados.</p>
                </div>
              </div>
            </footer>
        </div>
        @stack('modals')

        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
        <x-livewire-alert::scripts />
    </body>
</html>
