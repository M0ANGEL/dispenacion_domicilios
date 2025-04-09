<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>M.R</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    {{-- qr --}}
    <script src="https://unpkg.com/qrcode-reader/qrcode.js"></script>

    {{-- alerta --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- js para movimientp --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    {{-- ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- link de iconos --}}
    <script src="https://kit.fontawesome.com/099086e4a1.js" crossorigin="anonymous"></script>
    {{-- Graficos chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- alertas --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include CSS for Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Include JS for Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <!-- Styles -->
    @livewireStyles

    @stack('css')

    <style>
        body {
            background: #e4e1e1;
        }

        /* body {
            background: url({{ asset('images/navidad/navidad.png') }}) no-repeat center center fixed;
            background-size: cover;
            background-color: rgb(0, 0, 0);
            /* Esto es por si la imagen no carga o es pequeña */
        } */


        /* Archivo resources/css/app.css */
        table {
            background-color: #f0f0f0;
            /* Cambia este color según tu preferencia */
            color: #2c3e50;
            /* Color del texto */
        }
    </style>
</head>

<body class="font-sans antialiased">


    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar"
        aria-controls="cta-button-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    @include('layouts.admin.sidebar')

    {{-- @livewire('navigation-menu') --}}{{-- cerrar sesion --}}

    {{-- barra algun dia puede que la use jajaja --}}
    <div>
        @livewire('navigation-menu')
    </div>


    <div class="p-4 sm:ml-64"> {{-- linea de borde --}}
        <div class="p-4 {{-- border-2 --}} border-gray-800 {{-- border-dashed --}} rounded-lg dark:border-gray-700">
            {{-- contenido variable --}}
            {{ $slot }}
        </div>
        {{-- <div style="margin: 5% auto; width: fit-content; text-align: center;">
            <h4 style="background: green; border-radius: 10px; padding: 10px;">
                <a href="{{route('dashboard')}}"><b>MR-GESTION</b></a>
            </h4>
            <p></p>
        </div> --}}
    </div>


    @stack('modals')

    @livewireScripts

    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')))
        </script>
    @endif

    @stack('js')
</body>

</html>
