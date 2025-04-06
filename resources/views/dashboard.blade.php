<style>
    .cartas {
        background: white;
        border-radius: 10px;
        margin: 5% 25%;
    }

    .carta_info {
        padding: 20px;
        font-size: 18px;

    }

    #contador {
        text-align: center;
        font-size: 30px;
        background-color: rgb(47, 165, 10);
        border-radius: 8px;
        margin: 20px 20%;
        padding: 20px;
        border: solid rgb(8, 110, 9) 4px;
    }
</style>

{{-- <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @if (Auth::user()->perfil == 'aux_farmacia' || Auth::user()->perfil == 'quimico' || Auth::user()->perfil == 'regente' || Auth::user()->perfil == 'calidad' || Auth::user()->perfil == 'admin')
        <div class="cart-importante">
            <div class="row">
                <div class="cartas"> <br>
                    <h2 style="text-align: center; font-size: 25px; margin: 15px;"><b>INFORMACIÓN IMPORTANTE</b></h2>
                    <p class="carta_info">
                        Se solicita respetuosamente a todo el personal de FARMART LTDA. <br> que labora en el hospital
                        HUV cumplir con la obligación de registrar su asistencia biométrica antes de iniciar y al
                        finalizar sus
                        actividades laborales. <br><br>
                        Atentamente, <br> Subgerencia Farmart LTDA.
                        <br><br>
                    </p>
                </div>
            </div>
        </div>
    @endif

</x-app-layout> --}}

<x-app-layout>
    @if (Auth::user()->perfil == 'aux_farmacia' ||
            Auth::user()->perfil == 'quimico' ||
            Auth::user()->perfil == 'regente' ||
            Auth::user()->perfil == 'calidad' ||
            Auth::user()->perfil == 'admin')
        <div class="mb-12 grid gap-6 xl:grid-cols-4 md:grid-cols-3">
            <!-- Tarjeta 1 -->
            <a href="{{ route('vistamedica.index') }}">
                <div class="relative flex flex-col rounded-lg bg-white hover:bg-gray-800 p-6 shadow-md text-gray-700">
                    <!-- Icono e Indicador Numérico -->
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <i class="fa-brands fa-monero" style="color: #057030; font-size: 45px;"></i>
                        </div>
                        <span class="text-3xl font-bold " style="color: #057030;">{{ $vista }} </span>
                    </div>
                    <!-- Contenido de la Tarjeta -->
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Medicamentos Vista Medica</h4>
                    <!-- Botón -->
                </div>
            </a>

            <a href="{{ route('agotados') }}">
                <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                    <!-- Icono e Indicador Numérico -->
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <i class="fa-brands fa-monero" style="color: #f92424; font-size: 45px;"></i>
                        </div>
                        <span class="text-3xl font-bold " style="color: #f92424;">{{ $Agotados }}</span>
                    </div>
                    <!-- Contenido de la Tarjeta -->
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Medicamentos Agotados</h4>
                </div>
            </a>

            <a href="{{ route('Mipres_Activos.index') }}">
                <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                    <!-- Icono e Indicador Numérico -->
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <i class="fa-brands fa-monero" style="color: #0d0d0d; font-size: 45px;"></i>
                        </div>
                        <span class="text-3xl font-bold " style="color: #0d0d0d;">{{ $mipres }} </span>
                    </div>
                    <!-- Contenido de la Tarjeta -->
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Mipres Activos</h4>
                    <!-- Botón -->
                </div>
            </a>

            <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                <!-- Icono e Indicador Numérico -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <i class="fa-solid fa-user-injured" style=" font-size: 45px;"></i>
                    </div>
                    <span class="text-3xl font-bold text-blue-600">{{ $personas }}</span>
                </div>
                <!-- Contenido de la Tarjeta -->
                <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Pacientes</h4>
                <!-- Botón -->
                {{-- <button class="mt-auto bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"><b>Descargar
                    Reportes</b></button> --}}
            </div>
        </div>
    @endif

    {{-- contador 
    <div id="contador">
        <p class="mt-4" style="color: white;"><b>🦌 ⛄ 🎁 🌲 Feliz navidad <span style="color: red;"></span> 🦌 ⛄ 🎁
                🌲</b></p>
    </div>
    --}}
</x-app-layout>