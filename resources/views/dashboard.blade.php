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

<x-app-layout>
    <div class="mb-12 grid gap-6 xl:grid-cols-4 md:grid-cols-3">
        <!-- Tarjeta 1 -->
        <a href="{{ route('pacientes.index') }}">
            <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                <!-- Icono e Indicador Numérico -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <i class="fa-solid fa-user-injured" style=" font-size: 45px; color: #057030;"></i>
                    </div>
                    <span class="text-3xl font-bold " style="color: #057030;">{{ $pacientes1 }}</span>
                </div>
                <!-- Contenido de la Tarjeta -->
                <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Pacientes Creados</h4>
            </div>
        </a>

        <!-- Tarjeta 2 -->
        <a href="{{ route('solicitud.index') }}">
            <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                <!-- Icono e Indicador Numérico -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <i class="fa-regular fa-calendar-days" style="color: #f92424; font-size: 45px;"></i>
                    </div>
                    <span class="text-3xl font-bold " style="color: #f92424;">{{ $solicitudes_pendites }}</span>
                </div>
                <!-- Contenido de la Tarjeta -->
                <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Solicitudes Pendites</h4>
            </div>
        </a>

        <!-- Tarjeta 3 -->
        <a href="{{ route('dispensacion.index') }}">
            <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                <!-- Icono e Indicador Numérico -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <i class="fa-regular fa-calendar-days" style="color: #143dc2; font-size: 45px;"></i>
                    </div>
                    <span class="text-3xl font-bold " style="color: #143dc2;">{{ $solicitudes_realizadas }}</span>
                </div>
                <!-- Contenido de la Tarjeta -->
                <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Solicitudes Confirmadas</h4>
                <!-- Botón -->
            </div>
        </a>

        <!-- Tarjeta 4 -->
        <a href="{{ route('domicilios.index') }}">
            <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                <!-- Icono e Indicador Numérico -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <i class="fa-solid fa-truck" style="color: #0db03c; font-size: 45px;"></i>
                    </div>
                    <span class="text-3xl font-bold " style="color: #0db03c;">{{ $solicitudes_realizadas }}</span>
                </div>
                <!-- Contenido de la Tarjeta -->
                <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Domicilios en Envio</h4>
                <!-- Botón -->
            </div>
        </a>


        <!-- Tarjeta 5 -->
        <a href="{{ route('confirmacion.index') }}">
            <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
                <!-- Icono e Indicador Numérico -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <i class="fa-solid fa-user-check" style="color: #26d6f6; font-size: 45px;"></i>
                    </div>
                    <span class="text-3xl font-bold " style="color: #26d6f6;">{{ $solicitudes_realizadas }}</span>
                </div>
                <!-- Contenido de la Tarjeta -->
                <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Envios Confirmadas</h4>
                <!-- Botón -->
            </div>
        </a>
    </div>
</x-app-layout>
