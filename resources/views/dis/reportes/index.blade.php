<x-app-layout>
    <div class="mb-12 grid gap-6 xl:grid-cols-4 md:grid-cols-3">
        <!-- Tarjeta 1 -->
        <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
            <!-- Icono e Indicador Numérico -->
            <div class="flex justify-between items-start mb-4">
                <div>
                    <i class="fa-brands fa-monero" style="color: #057030; font-size: 45px;"></i>
                </div>
                <span class="text-3xl font-bold " style="color: #057030;">{{ $activos }} </span>
            </div>
            <!-- Contenido de la Tarjeta -->
            <h4 class="text-xl font-semibold text-gray-900 mb-2">Mipres Activos</h4>
            <!-- Botón -->
            <button class="mt-auto text-white px-4 py-2 rounded-lg" style="background: #057030">
                <a href="{{ route('reporte.activos') }}" class="btn btn-primary">Descargar Reporte de Activos</a>
            </button>
        </div>

        <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
            <!-- Icono e Indicador Numérico -->
            <div class="flex justify-between items-start mb-4">
                <div>
                    <i class="fa-brands fa-monero" style="color: #f92424; font-size: 45px;"></i>
                </div>
                <span class="text-3xl font-bold " style="color: #f92424;">{{ $inactivos }}</span>
            </div>
            <!-- Contenido de la Tarjeta -->
            <h4 class="text-xl font-semibold text-gray-900 mb-2">Mipres Terminado</h4>
            <!-- Botón -->
            <button class="mt-auto text-white px-4 py-2 rounded-lg " style="background: #f92424;">
                <a href="{{ route('reporte.terminados') }}" class="btn btn-primary">Descargar Reporte de terminados</a>
            </button>
        </div>

        <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
            <!-- Icono e Indicador Numérico -->
            <div class="flex justify-between items-start mb-4">
                <div>
                    <i class="fa-brands fa-monero" style="color: #0d0d0d; font-size: 45px;"></i>
                </div>
                <span class="text-3xl font-bold " style="color: #0d0d0d;">🇨🇴 </span>
            </div>
            <!-- Contenido de la Tarjeta -->
            <h4 class="text-xl font-semibold text-gray-900 mb-2">Reporte Detallado</h4>
            <!-- Botón -->
            <button class="mt-auto text-white px-4 py-2 rounded-lg" style="background: #0d0d0d">
                <a href="{{ route('reporte.detallado') }}" class="btn btn-primary">Descargar Reporte Detallado</a>
            </button>
        </div>

        <div class="relative flex flex-col rounded-lg bg-white p-6 shadow-md text-gray-700">
            <!-- Icono e Indicador Numérico -->
            <div class="flex justify-between items-start mb-4">
                <div>
                    <i class="fa-brands fa-think-peaks" style="color: #9d38e0; font-size: 45px;"></i>
                </div>
                <span class="text-3xl font-bold text-blue-600">{{ $medicamentos }}</span>
            </div>
            <!-- Contenido de la Tarjeta -->
            <h4 class="text-xl font-semibold text-gray-900 mb-2">Cantidad Medicamentos</h4>
            <!-- Botón -->
            {{-- <button class="mt-auto text-white px-4 py-2 rounded-lg" style="background: #9d38e0;"><b>Descargar
                    Reportes</b></button> --}}
        </div>

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
</x-app-layout>
